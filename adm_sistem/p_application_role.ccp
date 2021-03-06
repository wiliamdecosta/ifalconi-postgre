<Page id="1" templateExtension="html" relativePath=".." fullRelativePath=".\adm_sistem" secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" validateRequest="True" cachingDuration="1 minutes" wizardTheme="trb" wizardThemeVersion="3.0" needGeneration="0" pasteActions="pasteActions">
	<Components>
		<Record id="72" sourceType="SQL" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="Conn" name="P_APPROLEForm" errorSummator="Error" wizardCaption=" V P APPLICATION ROLE " wizardFormMethod="post" PathID="P_APPROLEForm" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions" activeCollection="SQLParameters" activeTableType="customDelete" parameterTypeListName="ParameterTypeList" dataSource="SELECT * 
FROM &quot;v_p_application_role&quot;
WHERE &quot;p_application_role_id&quot; = {P_APPLICATION_ROLE_ID} ">
			<Components>
				<Hidden id="79" fieldSourceType="DBColumn" dataType="Float" name="P_APPLICATION_ROLE_ID" fieldSource="p_application_role_id" required="False" caption="P APPLICATION ROLE ID" wizardCaption="P APPLICATION ROLE ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_APPROLEFormP_APPLICATION_ROLE_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Hidden id="80" fieldSourceType="DBColumn" dataType="Float" name="P_ROLE_ID" fieldSource="p_role_id" required="True" caption="P ROLE ID" wizardCaption="P ROLE ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_APPROLEFormP_ROLE_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Hidden id="82" fieldSourceType="DBColumn" dataType="Text" name="APPLICATION_CODE" fieldSource="application_code" required="False" caption="APPLICATION CODE" wizardCaption="APPLICATION CODE" wizardSize="32" wizardMaxLength="32" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_APPROLEFormAPPLICATION_CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Hidden id="81" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Float" returnValueType="Number" name="P_APPLICATION_ID" fieldSource="p_application_id" required="True" caption="MODUL" wizardCaption="P APPLICATION ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_APPROLEFormP_APPLICATION_ID" connection="Conn" dataSource="P_APPLICATION" boundColumn="P_APPLICATION_ID" textColumn="CODE">
					<Components/>
					<Events/>
					<TableParameters/>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables/>
					<JoinLinks/>
					<Fields/>
					<Attributes/>
					<Features/>
				</Hidden>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="78" conditionType="Parameter" useIsNull="False" field="P_APPLICATION_ROLE_ID" dataType="Float" searchConditionType="Equal" parameterType="URL" logicOperator="And" orderNumber="1" parameterSource="P_APPLICATION_ROLE_ID"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters>
				<SQLParameter id="142" parameterType="URL" variable="P_APPLICATION_ROLE_ID" dataType="Float" parameterSource="P_APPLICATION_ROLE_ID" defaultValue="0"/>
			</SQLParameters>
			<JoinTables>
				<JoinTable id="139" tableName="V_P_APPLICATION_ROLE" posWidth="160" posHeight="168" posLeft="10" posTop="10"/>
			</JoinTables>
			<JoinLinks/>
			<Fields/>
			<ISPParameters/>
			<ISQLParameters>
				<SQLParameter id="100" variable="P_ROLE_ID" dataType="Float" parameterType="Control" parameterSource="P_ROLE_ID"/>
				<SQLParameter id="101" variable="P_APPLICATION_ID" dataType="Float" parameterType="Control" parameterSource="P_APPLICATION_ID"/>
				<SQLParameter id="104" variable="CREATED_BY" dataType="Text" parameterType="Session" parameterSource="UserName"/>
			</ISQLParameters>
			<IFormElements>
				<CustomParameter id="93" field="P_APPLICATION_ROLE_ID" dataType="Float" parameterType="Control" parameterSource="P_APPLICATION_ROLE_ID"/>
				<CustomParameter id="94" field="P_ROLE_ID" dataType="Float" parameterType="Control" parameterSource="P_ROLE_ID"/>
				<CustomParameter id="95" field="P_APPLICATION_ID" dataType="Float" parameterType="Control" parameterSource="P_APPLICATION_ID"/>
				<CustomParameter id="96" field="APPLICATION_CODE" dataType="Text" parameterType="Control" parameterSource="APPLICATION_CODE"/>
				<CustomParameter id="97" field="CREATION_DATE" dataType="Date" parameterType="Control" parameterSource="CREATION_DATE" format="dd-mmm-yyyy"/>
				<CustomParameter id="98" field="CREATED_BY" dataType="Text" parameterType="Control" parameterSource="CREATED_BY"/>
			</IFormElements>
			<USPParameters/>
			<USQLParameters/>
			<UConditions/>
			<UFormElements/>
			<DSPParameters/>
			<DSQLParameters>
				<SQLParameter id="92" variable="P_APPLICATION_ROLE_ID" parameterType="Control" dataType="Float" parameterSource="P_APPLICATION_ROLE_ID" defaultValue="0"/>
			</DSQLParameters>
			<DConditions>
				<TableParameter id="91" conditionType="Parameter" useIsNull="False" field="P_APPLICATION_ROLE_ID" dataType="Float" searchConditionType="Equal" parameterType="Control" logicOperator="And" parameterSource="P_APPLICATION_ROLE_ID"/>
			</DConditions>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Record>
		<Label id="61" fieldSourceType="DBColumn" dataType="Text" html="False" name="role_code" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="role_code" defaultValue="CCGetFromGet(&quot;ROLE_CODE&quot;, NULL)">
			<Components/>
			<Events/>
			<Attributes/>
			<Features/>
		</Label>
		<EditableGrid id="105" urlType="Relative" secured="False" emptyRows="1" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" sourceType="SQL" defaultPageSize="15" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="Conn" dataSource="SELECT * 
FROM &quot;p_application_role&quot;
WHERE &quot;p_role_id&quot; = {P_ROLE_ID} " name="P_APPROLEGrid" pageSizeLimit="100" wizardCaption=" P APPLICATION ROLE " wizardGridType="Tabular" wizardAltRecord="False" wizardRecordSeparator="False" wizardNoRecords="-" PathID="P_APPROLEGrid" deleteControl="CheckBox_Delete" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions" customInsert="INSERT INTO p_application_role(p_application_role_id, p_role_id, p_application_id, creation_date, created_by) 
VALUES(generate_id('ifl','p_application_role','p_application_role_id'), {p_role_id}, {p_application_id}, current_date, '{created_by}')" customInsertType="SQL" parameterTypeListName="CustomTableParameterTypeList" activeCollection="ISQLParameters" customDeleteType="SQL" customDelete="DELETE FROM p_application_role WHERE p_application_role_id = {p_application_role_id}" customUpdateType="SQL" customUpdate="UPDATE p_application_role SET p_application_id = {p_application_id} 
WHERE  p_application_role_id = {p_application_role_id}" activeTableType="P_APPLICATION_ROLE">
			<Components>
				<ListBox id="109" visible="Yes" fieldSourceType="DBColumn" sourceType="SQL" dataType="Float" returnValueType="Number" name="P_APPLICATION_ID" fieldSource="p_application_id" required="False" caption="P APPLICATION ID" wizardCaption="P APPLICATION ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_APPROLEGridP_APPLICATION_ID" connection="Conn" dataSource="SELECT * 
FROM p_application" boundColumn="p_application_id" textColumn="code">
					<Components/>
					<Events/>
					<TableParameters/>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
						<JoinTable id="141" tableName="P_APPLICATION" posLeft="10" posTop="10" posWidth="127" posHeight="180"/>
					</JoinTables>
					<JoinLinks/>
					<Fields/>
					<Attributes/>
					<Features/>
				</ListBox>
				<Panel id="110" visible="True" name="CheckBox_Delete_Panel">
					<Components>
						<CheckBox id="111" visible="Dynamic" fieldSourceType="CodeExpression" dataType="Boolean" name="CheckBox_Delete" checkedValue="true" uncheckedValue="false" wizardAddNbsp="True" PathID="P_APPROLEGridCheckBox_Delete_PanelCheckBox_Delete">
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
				<Navigator id="112" size="10" type="Centered" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Custom" wizardFirst="True" wizardPrev="True" wizardNext="True" wizardLast="True" wizardImages="Images" wizardPageNumbers="Centered" wizardSize="10" wizardTotalPages="False" wizardHideDisabled="False" wizardPageSize="False" wizardImagesScheme="Trb">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="117"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Navigator>
				<Button id="113" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Submit" operation="Submit" wizardThemeItem="FooterIMG" wizardButtonImage="ButtonUpdateOn" PathID="P_APPROLEGridButton_Submit" removeParameters="P_APPLICATION_ROLE_ID">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Confirmation Message" actionCategory="General" id="114" message="Submit?"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="115" urlType="Relative" enableValidation="False" isDefault="False" name="Cancel" operation="Cancel" wizardThemeItem="FooterIMG" wizardButtonImage="ButtonCancelOn" PathID="P_APPROLEGridCancel">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Hidden id="107" fieldSourceType="DBColumn" dataType="Float" name="P_APPLICATION_ROLE_ID" fieldSource="p_application_role_id" required="False" caption="ID" wizardCaption="ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_APPROLEGridP_APPLICATION_ROLE_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Hidden id="108" fieldSourceType="DBColumn" dataType="Float" name="P_ROLE_ID" fieldSource="p_role_id" required="True" caption="P ROLE ID" wizardCaption="P ROLE ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_APPROLEGridP_ROLE_ID" defaultValue="CCGetFromGet(&quot;P_ROLE_ID&quot;, NULL)">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
				<Link id="118" visible="Yes" fieldSourceType="CodeExpression" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="DLink" wizardCaption="Detail" wizardSize="50" wizardMaxLength="60" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" dataType="Text" wizardDefaultValue="DLink" hrefSource="p_application_role.ccp" wizardThemeItem="GridA" PathID="P_APPROLEGridDLink" removeParameters="FLAG">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="119" sourceType="DataField" format="yyyy-mm-dd" name="P_APPLICATION_ROLE_ID" source="p_application_role_id"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Label id="127" fieldSourceType="DBColumn" dataType="Text" html="True" name="rowStyle" PathID="P_APPROLEGridrowStyle">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="137" fieldSourceType="DBColumn" dataType="Text" html="False" name="CREATED_BY" PathID="P_APPROLEGridCREATED_BY" fieldSource="created_by">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="138" fieldSourceType="DBColumn" dataType="Date" html="False" name="CREATION_DATE" PathID="P_APPROLEGridCREATION_DATE" fieldSource="creation_date" format="dd-mmm-yyyy">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
			</Components>
			<Events>
				<Event name="BeforeShowRow" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="116"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters>
				<TableParameter id="129" conditionType="Parameter" useIsNull="False" field="P_ROLE_ID" dataType="Float" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="P_ROLE_ID"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters>
				<SQLParameter id="140" parameterType="URL" variable="P_ROLE_ID" dataType="Float" parameterSource="P_ROLE_ID" defaultValue="0"/>
			</SQLParameters>
			<JoinTables>
				<JoinTable id="128" tableName="P_APPLICATION_ROLE" posWidth="160" posHeight="136" posLeft="10" posTop="10"/>
			</JoinTables>
			<JoinLinks/>
			<Fields/>
			<PKFields>
				<PKField id="106" tableName="P_APPLICATION_ROLE" fieldName="P_APPLICATION_ROLE_ID" dataType="Float"/>
			</PKFields>
			<ISPParameters/>
			<ISQLParameters>
				<SQLParameter id="123" variable="p_application_id" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_APPLICATION_ID"/>
				<SQLParameter id="124" variable="p_role_id" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_ROLE_ID"/>
				<SQLParameter id="125" variable="created_by" parameterType="Session" dataType="Text" parameterSource="UserName"/>
			</ISQLParameters>
			<IFormElements>
				<CustomParameter id="143" field="p_application_id" dataType="Float" parameterType="Control" parameterSource="P_APPLICATION_ID"/>
<CustomParameter id="144" field="p_application_role_id" dataType="Float" parameterType="Control" parameterSource="P_APPLICATION_ROLE_ID"/>
<CustomParameter id="145" field="p_role_id" dataType="Float" parameterType="Control" parameterSource="P_ROLE_ID"/>
</IFormElements>
			<USPParameters/>
			<USQLParameters>
				<SQLParameter id="135" variable="p_application_id" dataType="Float" parameterType="Control" parameterSource="P_APPLICATION_ID" defaultValue="0"/>
				<SQLParameter id="136" variable="p_application_role_id" parameterType="Control" dataType="Float" parameterSource="P_APPLICATION_ROLE_ID" defaultValue="0"/>
			</USQLParameters>
			<UConditions>
				<TableParameter id="134" conditionType="Parameter" useIsNull="False" field="P_APPLICATION_ROLE_ID" dataType="Float" searchConditionType="Equal" parameterType="Control" logicOperator="And" parameterSource="P_APPLICATION_ROLE_ID"/>
			</UConditions>
			<UFormElements>
				<CustomParameter id="131" field="P_APPLICATION_ID" dataType="Float" parameterType="Control" parameterSource="P_APPLICATION_ID"/>
			</UFormElements>
			<DSPParameters/>
			<DSQLParameters>
				<SQLParameter id="126" variable="p_application_role_id" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_APPLICATION_ROLE_ID"/>
			</DSQLParameters>
			<DConditions/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</EditableGrid>
	</Components>
	<CodeFiles>
		<CodeFile id="Events" language="PHPTemplates" name="p_application_role_events.php" forShow="False" comment="//" codePage="windows-1252"/>
		<CodeFile id="Code" language="PHPTemplates" name="p_application_role.php" forShow="True" url="p_application_role.php" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups/>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events>
		<Event name="OnInitializeView" type="Server">
			<Actions>
				<Action actionName="Custom Code" actionCategory="General" id="60"/>
			</Actions>
		</Event>
	</Events>
</Page>
