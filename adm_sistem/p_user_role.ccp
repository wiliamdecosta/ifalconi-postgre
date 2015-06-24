<Page id="1" templateExtension="html" relativePath=".." fullRelativePath=".\adm_sistem" secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" validateRequest="True" cachingDuration="1 minutes" wizardTheme="trb" wizardThemeVersion="3.0" needGeneration="0" pasteActions="pasteActions">
	<Components>
		<Label id="61" fieldSourceType="DBColumn" dataType="Text" html="False" name="user_name" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="user_name" defaultValue="CCGetFromGet(&quot;USER_NAME&quot;, NULL) .&quot; - &quot;.CCGetFromGet(&quot;FULL_NAME&quot;, NULL)">
			<Components/>
			<Events/>
			<Attributes/>
			<Features/>
		</Label>
		<EditableGrid id="110" urlType="Relative" secured="False" emptyRows="1" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" sourceType="Table" defaultPageSize="25" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="Conn" dataSource="p_user_role" name="P_UROLEGrid" orderBy="p_user_role_id" pageSizeLimit="100" wizardCaption=" P USER ROLE " wizardGridType="Tabular" wizardAltRecord="False" wizardRecordSeparator="False" wizardNoRecords="-" PathID="P_UROLEGrid" deleteControl="CheckBox_Delete" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions" activeCollection="ISQLParameters" parameterTypeListName="CustomTableParameterTypeList" customInsert="INSERT INTO p_user_role(p_user_role_id, p_role_id, p_user_id, creation_date, created_by ) 
VALUES(generate_id('ifl','p_user_role','p_user_role_id'),{p_role_id}, {p_user_id}, current_date,'{created_by}')" customInsertType="SQL" customUpdate="UPDATE p_user_role SET p_role_id = {p_role_id} WHERE  p_user_role_id = {p_user_role_id}" customUpdateType="SQL" activeTableType="customDelete" customDelete="DELETE FROM p_user_role WHERE  p_user_role_id = {p_user_role_id}" customDeleteType="SQL">
			<Components>
				<ListBox id="114" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Float" returnValueType="Number" name="P_ROLE_ID" fieldSource="p_role_id" required="True" caption="P ROLE ID" wizardCaption="P ROLE ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_UROLEGridP_ROLE_ID" connection="Conn" dataSource="p_role" boundColumn="p_role_id" textColumn="code">
					<Components/>
					<Events/>
					<TableParameters/>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
						<JoinTable id="139" tableName="P_ROLE" posLeft="10" posTop="10" posWidth="115" posHeight="180"/>
					</JoinTables>
					<JoinLinks/>
					<Fields/>
					<Attributes/>
					<Features/>
				</ListBox>
				<Label id="115" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="CREATED_BY" fieldSource="created_by" required="True" caption="CREATED BY" wizardCaption="CREATED BY" wizardSize="16" wizardMaxLength="16" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_UROLEGridCREATED_BY" html="False">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="116" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="CREATION_DATE" fieldSource="creation_date" required="True" caption="CREATION DATE" wizardCaption="CREATION DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_UROLEGridCREATION_DATE" html="False" format="dd-mmm-yyyy">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Panel id="118" visible="True" name="CheckBox_Delete_Panel">
					<Components>
						<CheckBox id="119" visible="Dynamic" fieldSourceType="CodeExpression" dataType="Boolean" name="CheckBox_Delete" checkedValue="true" uncheckedValue="false" wizardAddNbsp="True" PathID="P_UROLEGridCheckBox_Delete_PanelCheckBox_Delete">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</CheckBox>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Panel>
				<Navigator id="120" size="10" type="Centered" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Custom" wizardFirst="True" wizardPrev="True" wizardNext="True" wizardLast="True" wizardImages="Images" wizardPageNumbers="Centered" wizardSize="10" wizardTotalPages="False" wizardHideDisabled="False" wizardPageSize="False" wizardImagesScheme="Trb">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Navigator>
				<Button id="121" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Submit" operation="Submit" wizardThemeItem="FooterIMG" wizardButtonImage="ButtonUpdateOn" PathID="P_UROLEGridButton_Submit">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Confirmation Message" actionCategory="General" id="122" message="Submit?"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="123" urlType="Relative" enableValidation="False" isDefault="False" name="Cancel" operation="Cancel" wizardThemeItem="FooterIMG" wizardButtonImage="ButtonCancelOn" PathID="P_UROLEGridCancel">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Hidden id="113" fieldSourceType="DBColumn" dataType="Float" name="P_USER_ID" fieldSource="p_user_id" required="True" caption="P USER ID" wizardCaption="P USER ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_UROLEGridP_USER_ID" defaultValue="CCGetFromGet(&quot;P_USER_ID&quot;, NULL)">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Hidden id="112" fieldSourceType="DBColumn" dataType="Float" name="P_USER_ROLE_ID" fieldSource="p_user_role_id" required="False" caption="ID" wizardCaption="ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_UROLEGridP_USER_ROLE_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="125" conditionType="Parameter" useIsNull="False" field="p_user_id" dataType="Float" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="P_USER_ID"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters/>
			<JoinTables>
				<JoinTable id="138" tableName="p_user_role" posLeft="10" posTop="10" posWidth="98" posHeight="136"/>
			</JoinTables>
			<JoinLinks/>
			<Fields/>
			<PKFields>
				<PKField id="111" tableName="P_USER_ROLE" fieldName="P_USER_ROLE_ID" dataType="Float"/>
			</PKFields>
			<ISPParameters/>
			<ISQLParameters>
				<SQLParameter id="128" variable="p_role_id" dataType="Float" parameterType="Control" parameterSource="P_ROLE_ID" defaultValue="0"/>
				<SQLParameter id="129" variable="p_user_id" dataType="Float" parameterType="Control" parameterSource="P_USER_ID" defaultValue="0"/>
				<SQLParameter id="130" variable="created_by" parameterType="Session" dataType="Text" parameterSource="UserName"/>
			</ISQLParameters>
			<IFormElements>
				<CustomParameter id="126" field="P_ROLE_ID" dataType="Float" parameterType="Control" parameterSource="P_ROLE_ID"/>
				<CustomParameter id="127" field="P_USER_ID" dataType="Float" parameterType="Control" parameterSource="P_USER_ID"/>
			</IFormElements>
			<USPParameters/>
			<USQLParameters>
				<SQLParameter id="134" variable="p_role_id" dataType="Float" parameterType="Control" parameterSource="P_ROLE_ID" defaultValue="0"/>
				<SQLParameter id="135" variable="p_user_role_id" parameterType="Control" dataType="Float" parameterSource="P_USER_ROLE_ID" defaultValue="0"/>
			</USQLParameters>
			<UConditions>
				<TableParameter id="131" conditionType="Parameter" useIsNull="False" field="P_USER_ROLE_ID" dataType="Float" parameterType="Control" searchConditionType="Equal" logicOperator="And" parameterSource="P_USER_ROLE_ID"/>
			</UConditions>
			<UFormElements>
				<CustomParameter id="133" field="P_ROLE_ID" dataType="Float" parameterType="Control" parameterSource="P_ROLE_ID"/>
			</UFormElements>
			<DSPParameters/>
			<DSQLParameters>
				<SQLParameter id="137" variable="p_user_role_id" parameterType="Control" dataType="Float" parameterSource="P_USER_ROLE_ID" defaultValue="0"/>
			</DSQLParameters>
			<DConditions>
				<TableParameter id="136" conditionType="Parameter" useIsNull="False" field="P_USER_ROLE_ID" dataType="Float" parameterType="Control" searchConditionType="Equal" logicOperator="And" parameterSource="P_USER_ROLE_ID"/>
			</DConditions>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</EditableGrid>
	</Components>
	<CodeFiles>
		<CodeFile id="Code" language="PHPTemplates" name="p_user_role.php" forShow="True" url="p_user_role.php" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups/>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events>
	</Events>
</Page>
