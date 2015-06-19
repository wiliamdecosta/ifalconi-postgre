<Page id="1" templateExtension="html" relativePath=".." fullRelativePath=".\adm_sistem" secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="Spring" wizardThemeVersion="3.0" needGeneration="0">
	<Components>
		<Record id="2" sourceType="SQL" urlType="Relative" secured="False" allowInsert="False" allowUpdate="True" allowDelete="False" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="Conn" name="p_app_user" errorSummator="Error" wizardCaption="Add/Edit Hms P App User " wizardFormMethod="post" PathID="p_app_user" customUpdateType="SQL" customUpdate="UPDATE p_user SET user_pwd = UPPER('{password1}') WHERE  P_USER_ID = {user_id}" parameterTypeListName="ParameterTypeList" activeCollection="USQLParameters" pasteActions="pasteActions" returnPage="../main/module.ccp" pasteAsReplace="pasteAsReplace" activeTableType="customUpdate" dataSource="SELECT * 
FROM p_user
WHERE p_user_id = {UserID} ">
			<Components>
				<Button id="3" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Update" operation="Update" wizardCaption="Submit" PathID="p_app_userButton_Update">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<TextBox id="7" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="user_name" fieldSource="user_name" required="False" caption="User Name" wizardCaption="User Name" wizardSize="50" wizardMaxLength="96" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_app_useruser_name">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="8" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="password1" PathID="p_app_userpassword1" caption="New Password" required="True">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="9" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="password2" PathID="p_app_userpassword2" required="True" caption="Retype New Password">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="10" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="old_pass" PathID="p_app_userold_pass" caption="Old Password" required="True">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="5" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="user_id" fieldSource="p_user_id" required="True" caption="User Id" wizardCaption="User Id" wizardSize="16" wizardMaxLength="16" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_app_useruser_id">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Hidden id="21" fieldSourceType="DBColumn" dataType="Text" name="user_pwd" PathID="p_app_useruser_pwd" fieldSource="user_pwd">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="4" conditionType="Parameter" useIsNull="False" field="p_user_id" dataType="Float" logicOperator="And" searchConditionType="Equal" parameterType="Session" orderNumber="1" parameterSource="UserID"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters>
<SQLParameter id="25" parameterType="Session" variable="UserID" dataType="Float" parameterSource="UserID" designDefaultValue="1"/>
</SQLParameters>
			<JoinTables>
			</JoinTables>
			<JoinLinks/>
			<Fields/>
			<ISPParameters/>
			<ISQLParameters/>
			<IFormElements/>
			<USPParameters/>
			<USQLParameters>
				<SQLParameter id="15" variable="password1" parameterType="Control" dataType="Text" parameterSource="password1"/>
				<SQLParameter id="20" variable="user_id" parameterType="Control" dataType="Float" parameterSource="user_id" defaultValue="0"/>
				<SQLParameter id="22" variable="old_pass" parameterType="Control" dataType="Text" parameterSource="old_pass"/>
				<SQLParameter id="23" variable="password2" parameterType="Control" dataType="Text" parameterSource="password2"/>
				<SQLParameter id="24" variable="user_pwd" parameterType="Control" dataType="Text" parameterSource="user_pwd"/>
			</USQLParameters>
			<UConditions>
				<TableParameter id="19" conditionType="Parameter" useIsNull="False" field="P_USER_ID" dataType="Float" searchConditionType="Equal" parameterType="Control" logicOperator="And" parameterSource="user_id"/>
			</UConditions>
			<UFormElements>
				<CustomParameter id="12" field="user_pwd" dataType="Text" parameterType="Control" parameterSource="password1" omitIfEmpty="True"/>
			</UFormElements>
			<DSPParameters/>
			<DSQLParameters/>
			<DConditions/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Record>
	</Components>
	<CodeFiles>
		<CodeFile id="Code" language="PHPTemplates" name="user_password_self.php" forShow="True" url="user_password_self.php" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups/>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events/>
</Page>
