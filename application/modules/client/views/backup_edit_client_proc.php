USE [pvs_hr_dev]
GO
/****** Object:  StoredProcedure [dbo].[edit_client_proc]    Script Date: 7/13/2021 8:02:09 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
-- =============================================
-- Author:		<Author,,Name>
-- Create date: <Create Date,,>
-- Description:	<Description,,>
-- =============================================
ALTER PROCEDURE [dbo].[edit_client_proc] 
	-- Add the parameters for the stored procedure here
	@p_client_id int,
	@p_client_name varchar(255),
	@p_agreement_start_date varchar(10),
	@p_agreement_end_date varchar(10),
	@p_industry_type_id INT,
	@p_rating_id INT,
	@p_location_type varchar(45),
	@p_address_1 text,
	@p_address_2 text,
	@p_address_3 text,
	@p_state_id int,
	@p_city_id int,
	@p_pincode varchar(6),
	@p_contact_no varchar(15),
	@p_fax_no varchar(20),
	@p_email varchar(30),
	@p_website varchar(45),
	@p_foundation_date varchar(10),
	@p_contract_status_id int,
	@p_mw_type_id int,
	@p_source_id int,
	@p_source_reference varchar(45),
	@p_user_id int,
	@p_remarks text,
	@p_detail_data text,
	@p_action varchar(20)
	
AS
BEGIN
	-- SET NOCOUNT ON added to prevent extra result sets from
	-- interfering with SELECT statements.
	SET NOCOUNT ON;
	DECLARE @v_id int;
	declare @v_value varchar(255);
	declare @contact_id varchar(20);
	declare @name varchar(50);
	declare @designation varchar(50);
	declare @contact_no varchar(12);
	declare @email varchar(25);
	declare @dob varchar(12);
	declare @anniversary varchar(12);

    -- Insert statements for procedure here
		BEGIN

			UPDATE client_mst set client_name=@p_client_name,agreement_start_date=@p_agreement_start_date,agreement_end_date=@p_agreement_end_date,
			industry_type_id=@p_industry_type_id,rating_id=@p_rating_id,location_type=@p_location_type,address_1=@p_address_1,
		address_2=@p_address_2,address_3=@p_address_3,state_id=@p_state_id,city_id=@p_city_id,pincode=@p_pincode,contact_no=@p_contact_no,fax_no=@p_fax_no,
		email=@p_email,website=@p_website,foundation_date=CASE WHEN @p_foundation_date = '' THEN NULL ELSE @p_foundation_date END,contract_status_id=@p_contract_status_id,mw_type_id=@p_mw_type_id,
		source_id=@p_source_id,source_reference=@p_source_reference,active_status=1,updated_by=@p_user_id,updated_ts=GETDATE(),
		remarks=@p_remarks where client_id=@p_client_id;
			
		
	DECLARE contact_detail CURSOR FOR 
		SELECT 
		dbo.SplitIndex(value, '|~|', 1) AS contact_id, 
		dbo.SplitIndex(value, '|~|', 2) AS name, 
		dbo.SplitIndex(value, '|~|', 3) AS designation, 
		dbo.SplitIndex(value, '|~|', 4) AS contact_no, 
		dbo.SplitIndex(value, '|~|', 5) AS email, 
		dbo.SplitIndex(value, '|~|', 6) AS dob, 
		dbo.SplitIndex(value, '|~|', 7) AS anniversary
	FROM STRING_SPLIT(@p_detail_data, '|#|');

	OPEN contact_detail;
	-- get_contact_detail: LOOP
            FETCH contact_detail INTO 
                @contact_id, @name, @designation,@contact_no,@email,@dob,@anniversary;

	WHILE @@FETCH_STATUS = 0  
	BEGIN  

	if @anniversary = '2000-'
	SET @anniversary = NULL;

	if @dob = '2000-'
	SET @dob = NULL;

	if @contact_id <> '' 
		/*if @anniversary = '2000-'
		UPDATE client_contact_mst SET
                    name = @name,
                    designation = @designation,
                    contact_no = @contact_no,
                    email = @email,
                    birth_date = @dob,
                    anniversary_date = @anniversary,
                    updated_ts = GETDATE(),
                    updated_by = @p_user_id
                    WHERE client_contact_id = @contact_id;
		else */
		UPDATE client_contact_mst SET
                    name = @name,
                    designation = @designation,
                    contact_no = @contact_no,
                    email = @email,
                    birth_date = @dob,
                    anniversary_date = @anniversary,
                    updated_ts = GETDATE(),
                    updated_by = @p_user_id
                    WHERE client_contact_id = @contact_id; 
         
	else
		/*if @anniversary = '2000-'
			insert into client_contact_mst(client_id,name,designation,contact_no,email,birth_date,anniversary_date,created_by,created_ts) values
		(@p_client_id,@name,@designation,@contact_no,@email,@dob,NULL,@p_user_id,GETDATE());
		else*/
			insert into client_contact_mst(client_id,name,designation,contact_no,email,birth_date,anniversary_date,created_by,created_ts) values
		(@p_client_id,@name,@designation,@contact_no,@email,@dob,@anniversary,@p_user_id,GETDATE());


		FETCH NEXT FROM contact_detail INTO 
            @contact_id, @name, @designation,@contact_no,@email,@dob,@anniversary;

	END

	CLOSE contact_detail;  
DEALLOCATE contact_detail;
	
	IF @p_action = 'approval'
		UPDATE client_mst set submit_for_approval = 1 WHERE client_id = @p_client_id;
	
	END
END
