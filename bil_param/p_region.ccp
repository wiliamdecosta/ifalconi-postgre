<Page id="1" templateExtension="html" relativePath=".." fullRelativePath=".\bill_param" secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="Apricot" wizardThemeVersion="3.0" needGeneration="0">
	<Components>
		<Grid id="2" secured="False" sourceType="SQL" returnValueType="Number" defaultPageSize="10" connection="Conn" dataSource="SELECT A.*,B.LEVEL_NAME,C.CODE FROM P_REGION A , P_REGION_LEVEL B , P_BUSINESS_AREA C
WHERE A.P_REGION_LEVEL_ID = B.P_REGION_LEVEL_ID (+)
AND A.P_BUSINESS_AREA_ID = C.P_BUSINESS_AREA_ID (+)
AND UPPER(REGION_NAME) LIKE UPPER('%{s_keyword}%')" name="P_REGION" orderBy="P_REGION_ID" pageSizeLimit="100" wizardCaption=" P REGION " wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="True" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="no record" pasteActions="pasteActions">
			<Components>
				<Label id="20" fieldSourceType="DBColumn" dataType="Text" html="False" name="REGION_NAME" fieldSource="REGION_NAME" wizardCaption="REGION NAME" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_REGIONREGION_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="22" fieldSourceType="DBColumn" dataType="Text" html="False" name="LEVEL_NAME" fieldSource="LEVEL_NAME" wizardCaption="LEVEL ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="P_REGIONLEVEL_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="24" fieldSourceType="DBColumn" dataType="Text" html="False" name="CODE" fieldSource="CODE" wizardCaption="P BUSINESS AREA ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="P_REGIONCODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="26" fieldSourceType="DBColumn" dataType="Float" html="False" name="PARENT_ID" fieldSource="PARENT_ID" wizardCaption="PARENT ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="P_REGIONPARENT_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="28" fieldSourceType="DBColumn" dataType="Text" html="False" name="DESCRIPTION" fieldSource="DESCRIPTION" wizardCaption="DESCRIPTION" wizardSize="50" wizardMaxLength="128" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_REGIONDESCRIPTION">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Navigator id="33" size="5" type="Centered" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Custom" wizardFirst="True" wizardPrev="True" wizardNext="True" wizardLast="True" wizardPageNumbers="Centered" wizardSize="10" wizardTotalPages="False" wizardHideDisabled="False" wizardPageSize="False" wizardImages="Images" wizardUsePageScroller="True">
					<Components/>
					<Events>
<Event name="BeforeShow" type="Server">
<Actions>
<Action actionName="Custom Code" actionCategory="General" id="75"/>
</Actions>
</Event>
</Events>
					<Attributes/>
					<Features/>
				</Navigator>
				<Link id="54" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="P_REGION_Insert" PathID="P_REGIONP_REGION_Insert" hrefSource="p_region.ccp" wizardUseTemplateBlock="False" removeParameters="P_REGION_LEVEL_ID">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="55"/>
							</Actions>
						</Event>
					</Events>
					<LinkParameters>
						<LinkParameter id="56" sourceType="Expression" name="TAMBAH" source="1"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Link id="78" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" hrefType="Page" urlType="Relative" preserveParameters="GET" name="DLink" PathID="P_REGIONDLink" hrefSource="p_region.ccp" wizardTheme="sikm" wizardThemeVersion="3.0" removeParameters="FLAG" html="True" wizardUseTemplateBlock="True">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="79" sourceType="DataField" name="P_REGION_ID" source="P_REGION_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
<Hidden id="17" visible="Yes" fieldSourceType="DBColumn" dataType="Float" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="P_REGION_ID" fieldSource="P_REGION_ID" wizardCaption="ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" hrefSource="p_region.ccp" wizardThemeItem="GridA" PathID="P_REGIONP_REGION_ID">
<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="18" sourceType="DataField" format="yyyy-mm-dd" name="P_REGION_ID" source="P_REGION_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Hidden>
</Components>
			<Events>
<Event name="BeforeShowRow" type="Server">
<Actions>
<Action actionName="Set Row Style" actionCategory="General" id="73" styles="Row;AltRow"/>
<Action actionName="Custom Code" actionCategory="General" id="74"/>
</Actions>
</Event>
</Events>
			<TableParameters>
				<TableParameter id="8" conditionType="Parameter" useIsNull="False" field="REGION_NAME" parameterSource="s_keyword" dataType="Text" logicOperator="Or" searchConditionType="Contains" parameterType="URL" orderNumber="1" leftBrackets="1" rightBrackets="1"/>
			</TableParameters>
			<JoinTables/>
			<JoinLinks/>
			<Fields>
			</Fields>
			<SPParameters/>
			<SQLParameters>
<SQLParameter id="58" parameterType="URL" variable="s_keyword" dataType="Text" parameterSource="s_keyword"/>
</SQLParameters>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Grid>
		<Record id="3" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="P_REGIONSearch" wizardCaption=" P REGION " wizardOrientation="Vertical" wizardFormMethod="post" returnPage="p_region.ccp" PathID="P_REGIONSearch" pasteActions="pasteActions">
			<Components>
				<TextBox id="5" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_keyword" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" PathID="P_REGIONSearchs_keyword">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Button id="57" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" wizardCaption="Search" PathID="P_REGIONSearchButton_DoSearch" wizardTheme="sikm" wizardThemeVersion="3.0" removeParameters="FLAG;p_application_id">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
			</Components>
			<Events/>
			<TableParameters/>
			<SPParameters/>
			<SQLParameters/>
			<JoinTables/>
			<JoinLinks/>
			<Fields/>
			<ISPParameters/>
			<ISQLParameters/>
			<IFormElements/>
			<USPParameters/>
			<USQLParameters/>
			<UConditions/>
			<UFormElements/>
			<DSPParameters/>
			<DSQLParameters/>
			<DConditions/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Record>
		<Record id="34" sourceType="SQL" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="Conn" name="P_REGION1" dataSource="SELECT A.*,B.LEVEL_NAME,C.CODE FROM P_REGION A , P_REGION_LEVEL B , P_BUSINESS_AREA C
WHERE A.P_REGION_LEVEL_ID = B.P_REGION_LEVEL_ID (+)
AND A.P_BUSINESS_AREA_ID = C.P_BUSINESS_AREA_ID (+)
AND P_REGION_ID = {P_REGION_ID}" errorSummator="Error" wizardCaption=" P REGION " wizardFormMethod="post" PathID="P_REGION1" pasteActions="pasteActions" customInsertType="SQL" customInsert="INSERT INTO P_REGION (P_REGION_ID, REGION_NAME, P_REGION_LEVEL_ID, P_BUSINESS_AREA_ID, PARENT_ID, DESCRIPTION, UPDATE_DATE, UPDATE_BY)
VALUES (GENERATE_ID('BILLDB','P_REGION','P_REGION_ID'),'{REGION_NAME}',{P_REGION_LEVEL_ID},{P_BUSINESS_AREA_ID},{PARENT_ID},'{DESCRIPTION}',SYSDATE,'{UPDATE_BY}')" customUpdateType="SQL" customUpdate="UPDATE P_REGION SET
REGION_NAME = '{REGION_NAME}',
P_REGION_LEVEL_ID = {P_REGION_LEVEL_ID},
P_BUSINESS_AREA_ID = {P_BUSINESS_AREA_ID},
PARENT_ID = {PARENT_ID},
DESCRIPTION = '{DESCRIPTION}',
UPDATE_DATE = SYSDATE,
UPDATE_BY = '{UPDATE_BY}'
WHERE P_REGION_ID={P_REGION_ID}" customDeleteType="SQL" customDelete="DELETE P_REGION
WHERE P_REGION_ID = {P_REGION_ID}" parameterTypeListName="ParameterTypeList" activeCollection="DSQLParameters">
			<Components>
				<TextBox id="41" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="REGION_NAME" fieldSource="REGION_NAME" required="True" caption="REGION NAME" wizardCaption="REGION NAME" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_REGION1REGION_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="42" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_REGION_LEVEL_ID" fieldSource="P_REGION_LEVEL_ID" required="True" caption="LEVEL ID" wizardCaption="LEVEL ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_REGION1P_REGION_LEVEL_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="43" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_BUSINESS_AREA_ID" fieldSource="P_BUSINESS_AREA_ID" required="False" caption="P BUSINESS AREA ID" wizardCaption="P BUSINESS AREA ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_REGION1P_BUSINESS_AREA_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="44" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="PARENT_ID" fieldSource="PARENT_ID" required="False" caption="PARENT ID" wizardCaption="PARENT ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_REGION1PARENT_ID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextArea id="45" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="DESCRIPTION" fieldSource="DESCRIPTION" required="False" caption="DESCRIPTION" wizardCaption="DESCRIPTION" wizardSize="50" wizardMaxLength="128" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_REGION1DESCRIPTION">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextArea>
				<TextBox id="46" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="UPDATE_DATE" fieldSource="UPDATE_DATE" required="True" caption="UPDATE DATE" wizardCaption="UPDATE DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_REGION1UPDATE_DATE" defaultValue="CurrentDate" format="dd-mmm-yyyy">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<DatePicker id="47" name="DatePicker_UPDATE_DATE" control="UPDATE_DATE" wizardSatellite="True" wizardControl="UPDATE_DATE" wizardDatePickerType="Image" wizardPicture="../Styles/Apricot/Images/DatePicker.gif" style="../Styles/Apricot/Style.css" PathID="P_REGION1DatePicker_UPDATE_DATE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</DatePicker>
				<TextBox id="48" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="UPDATE_BY" fieldSource="UPDATE_BY" required="True" caption="UPDATE BY" wizardCaption="UPDATE BY" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_REGION1UPDATE_BY" defaultValue="CCGetUserLogin()">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Button id="49" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" wizardCaption="Add" PathID="P_REGION1Button_Insert" removeParameters="TAMBAH" wizardTheme="sikm" wizardThemeVersion="3.0">
					<Components/>
					<Events>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="50" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Update" operation="Update" wizardCaption="Submit" PathID="P_REGION1Button_Update" wizardTheme="sikm" wizardThemeVersion="3.0" removeParameters="TAMBAH">
					<Components/>
					<Events>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="51" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Delete" operation="Delete" wizardCaption="Delete" PathID="P_REGION1Button_Delete" wizardTheme="sikm" wizardThemeVersion="3.0" removeParameters="TAMBAH;P_APPLICATION_ID">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Confirmation Message" actionCategory="General" id="52" eventType="Client" message="Hapus Modul?"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="53" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Cancel" operation="Cancel" wizardCaption="Cancel" PathID="P_REGION1Button_Cancel" removeParameters="TAMBAH">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Hidden id="80" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_REGION_ID" fieldSource="P_REGION_ID" required="False" caption="LEVEL ID" wizardCaption="LEVEL ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_REGION1P_REGION_ID">
<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
<TextBox id="97" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="LEVEL_NAME" fieldSource="LEVEL_NAME" required="False" caption="LEVEL ID" wizardCaption="LEVEL ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_REGION1LEVEL_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
<TextBox id="98" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="CODE" fieldSource="CODE" required="False" caption="P BUSINESS AREA ID" wizardCaption="P BUSINESS AREA ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="P_REGION1CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="40" conditionType="Parameter" useIsNull="False" field="P_REGION_ID" parameterSource="P_REGION_ID" dataType="Float" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="1"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters>
<SQLParameter id="59" parameterType="URL" variable="P_REGION_ID" dataType="Float" parameterSource="P_REGION_ID"/>
</SQLParameters>
			<JoinTables/>
			<JoinLinks/>
			<Fields/>
			<ISPParameters/>
			<ISQLParameters>
<SQLParameter id="67" variable="REGION_NAME" parameterType="Control" dataType="Text" parameterSource="REGION_NAME"/>
<SQLParameter id="68" variable="P_REGION_LEVEL_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_REGION_LEVEL_ID"/>
<SQLParameter id="69" variable="P_BUSINESS_AREA_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_BUSINESS_AREA_ID"/>
<SQLParameter id="70" variable="PARENT_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="PARENT_ID"/>
<SQLParameter id="71" variable="DESCRIPTION" parameterType="Control" dataType="Text" parameterSource="DESCRIPTION"/>
<SQLParameter id="72" variable="UPDATE_BY" parameterType="Control" dataType="Text" parameterSource="UPDATE_BY"/>
</ISQLParameters>
			<IFormElements>
<CustomParameter id="60" field="REGION_NAME" dataType="Text" parameterType="Control" parameterSource="REGION_NAME"/>
<CustomParameter id="61" field="P_REGION_LEVEL_ID" dataType="Float" parameterType="Control" parameterSource="P_REGION_LEVEL_ID"/>
<CustomParameter id="62" field="P_BUSINESS_AREA_ID" dataType="Float" parameterType="Control" parameterSource="P_BUSINESS_AREA_ID"/>
<CustomParameter id="63" field="PARENT_ID" dataType="Float" parameterType="Control" parameterSource="PARENT_ID"/>
<CustomParameter id="64" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
<CustomParameter id="65" field="UPDATE_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATE_DATE"/>
<CustomParameter id="66" field="UPDATE_BY" dataType="Text" parameterType="Control" parameterSource="UPDATE_BY"/>
</IFormElements>
			<USPParameters/>
			<USQLParameters>
<SQLParameter id="89" variable="REGION_NAME" parameterType="Control" dataType="Text" parameterSource="REGION_NAME"/>
<SQLParameter id="90" variable="P_REGION_LEVEL_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_REGION_LEVEL_ID"/>
<SQLParameter id="91" variable="P_BUSINESS_AREA_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_BUSINESS_AREA_ID"/>
<SQLParameter id="92" variable="PARENT_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="PARENT_ID"/>
<SQLParameter id="93" variable="DESCRIPTION" parameterType="Control" dataType="Text" parameterSource="DESCRIPTION"/>
<SQLParameter id="94" variable="UPDATE_BY" parameterType="Control" dataType="Text" parameterSource="UPDATE_BY"/>
<SQLParameter id="95" variable="P_REGION_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_REGION_ID"/>
</USQLParameters>
			<UConditions/>
			<UFormElements>
<CustomParameter id="81" field="REGION_NAME" dataType="Text" parameterType="Control" parameterSource="REGION_NAME"/>
<CustomParameter id="82" field="P_REGION_LEVEL_ID" dataType="Float" parameterType="Control" parameterSource="P_REGION_LEVEL_ID"/>
<CustomParameter id="83" field="P_BUSINESS_AREA_ID" dataType="Float" parameterType="Control" parameterSource="P_BUSINESS_AREA_ID"/>
<CustomParameter id="84" field="PARENT_ID" dataType="Float" parameterType="Control" parameterSource="PARENT_ID"/>
<CustomParameter id="85" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
<CustomParameter id="86" field="UPDATE_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATE_DATE" format="dd-mmm-yyyy"/>
<CustomParameter id="87" field="UPDATE_BY" dataType="Text" parameterType="Control" parameterSource="UPDATE_BY"/>
<CustomParameter id="88" field="P_REGION_ID" dataType="Float" parameterType="Control" parameterSource="P_REGION_ID"/>
</UFormElements>
			<DSPParameters/>
			<DSQLParameters>
<SQLParameter id="96" variable="P_REGION_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_REGION_ID"/>
</DSQLParameters>
			<DConditions/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Record>
	</Components>
	<CodeFiles>
		<CodeFile id="Code" language="PHPTemplates" name="p_region.php" forShow="True" url="p_region.php" comment="//" codePage="windows-1252"/>
		<CodeFile id="Events" language="PHPTemplates" name="p_region_events.php" forShow="False" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups/>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events>
<Event name="OnInitializeView" type="Server">
<Actions>
<Action actionName="Custom Code" actionCategory="General" id="76"/>
</Actions>
</Event>
<Event name="BeforeShow" type="Server">
<Actions>
<Action actionName="Custom Code" actionCategory="General" id="77"/>
</Actions>
</Event>
</Events>
</Page>
