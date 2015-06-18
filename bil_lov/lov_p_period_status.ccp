<Page id="1" templateExtension="html" relativePath=".." fullRelativePath=".\lov" secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="Apricot" wizardThemeVersion="3.0">
	<Components>
		<Grid id="2" secured="False" sourceType="SQL" returnValueType="Number" defaultPageSize="10" connection="Conn" dataSource="SELECT * FROM BLUP.P_PERIOD_STATUS
WHERE UPPER(CODE) LIKE UPPER('%{s_keyword}%')" name="P_PERIOD_STATUS" orderBy="P_PERIOD_STATUS_ID" pageSizeLimit="100" wizardCaption=" P PERIOD STATUS " wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="False" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="no records">
<Components>
<Hidden id="9" fieldSourceType="DBColumn" dataType="Float" html="False" name="P_PERIOD_STATUS_ID" fieldSource="P_PERIOD_STATUS_ID" wizardCaption="ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="P_PERIOD_STATUSP_PERIOD_STATUS_ID">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Hidden>
<Label id="10" fieldSourceType="DBColumn" dataType="Text" html="False" name="CODE" fieldSource="CODE" wizardCaption="CODE" wizardSize="32" wizardMaxLength="32" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_PERIOD_STATUSCODE">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
<Navigator id="11" size="5" type="Centered" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Custom" wizardFirst="True" wizardPrev="True" wizardNext="True" wizardLast="True" wizardImages="Images" wizardPageNumbers="Centered" wizardSize="5" wizardTotalPages="False" wizardHideDisabled="False" wizardPageSize="False" wizardImagesScheme="Apricot">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Navigator>
<Label id="13" fieldSourceType="DBColumn" dataType="Text" html="True" name="Label1" PathID="P_PERIOD_STATUSLabel1">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
</Components>
<Events>
<Event name="BeforeShowRow" type="Server">
<Actions>
<Action actionName="Custom Code" actionCategory="General" id="14"/>
</Actions>
</Event>
</Events>
<TableParameters>
<TableParameter id="6" conditionType="Parameter" useIsNull="False" field="CODE" parameterSource="s_keyword" dataType="Text" logicOperator="Or" searchConditionType="Contains" parameterType="URL" orderNumber="1" leftBrackets="1" rightBrackets="1"/>
</TableParameters>
<JoinTables/>
<JoinLinks/>
<Fields/>
<SPParameters/>
<SQLParameters>
<SQLParameter id="12" parameterType="URL" variable="s_keyword" dataType="Text" parameterSource="s_keyword"/>
</SQLParameters>
<SecurityGroups/>
<Attributes/>
<Features/>
</Grid>
<Record id="3" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="P_PERIOD_STATUSSearch" wizardCaption=" P PERIOD STATUS " wizardOrientation="Vertical" wizardFormMethod="post" returnPage="lov_p_period_status.ccp" PathID="P_PERIOD_STATUSSearch" pasteActions="pasteActions">
<Components>
<TextBox id="5" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_keyword" wizardSize="32" wizardMaxLength="32" wizardIsPassword="False" PathID="P_PERIOD_STATUSSearchs_keyword">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<Button id="15" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" wizardCaption="Search" PathID="P_PERIOD_STATUSSearchButton_DoSearch" wizardTheme="sikm" wizardThemeVersion="3.0" removeParameters="FLAG;p_application_id">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
<Hidden id="16" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="FORM" PathID="P_PERIOD_STATUSSearchFORM">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
<TextBox id="17" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="OBJ" PathID="P_PERIOD_STATUSSearchOBJ">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
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
</Components>
	<CodeFiles>
		<CodeFile id="Code" language="PHPTemplates" name="lov_p_period_status.php" forShow="True" url="lov_p_period_status.php" comment="//" codePage="windows-1252"/>
<CodeFile id="Events" language="PHPTemplates" name="lov_p_period_status_events.php" forShow="False" comment="//" codePage="windows-1252"/>
</CodeFiles>
	<SecurityGroups/>
<CachingParameters/>
<Attributes/>
<Features/>
<Events/>
</Page>
