<Page id="1" templateExtension="html" relativePath=".." fullRelativePath=".\param" secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="Apricot" wizardThemeVersion="3.0" needGeneration="0">
	<Components>
		<Grid id="2" secured="False" sourceType="SQL" returnValueType="Number" defaultPageSize="10" connection="Conn" dataSource="select a.*,b.code as p_country_name from p_city_coordinate a ,
p_country b
where a.p_country_id=b.p_country_id
and upper(a.code) like upper('%{s_keyword}%')" name="P_CITY_COORDINATE" orderBy="P_CITY_COORDINATE_ID" pageSizeLimit="100" wizardCaption=" P CITY COORDINATE " wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="True" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="Data Tidak Ditemukan" pasteActions="pasteActions">
			<Components>
				<Label id="29" fieldSourceType="DBColumn" dataType="Text" html="False" name="CODE" fieldSource="CODE" wizardCaption="CODE" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_CITY_COORDINATECODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="31" fieldSourceType="DBColumn" dataType="Text" html="False" name="CITY_NAME" fieldSource="CITY_NAME" wizardCaption="CITY NAME" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_CITY_COORDINATECITY_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="33" fieldSourceType="DBColumn" dataType="Text" html="False" name="P_COUNTRY_NAME" fieldSource="P_COUNTRY_NAME" wizardCaption="P COUNTRY ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="P_CITY_COORDINATEP_COUNTRY_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="47" fieldSourceType="DBColumn" dataType="Float" html="False" name="TIME_REF" fieldSource="TIME_REF" wizardCaption="TIME REF" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="P_CITY_COORDINATETIME_REF">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="49" fieldSourceType="DBColumn" dataType="Text" html="False" name="DESCRIPTION" fieldSource="DESCRIPTION" wizardCaption="DESCRIPTION" wizardSize="50" wizardMaxLength="128" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="P_CITY_COORDINATEDESCRIPTION">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Navigator id="58" size="10" type="Moving" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Custom" wizardFirst="True" wizardPrev="True" wizardNext="True" wizardLast="True" wizardPageNumbers="Moving" wizardSize="10" wizardTotalPages="True" wizardHideDisabled="True" wizardPageSize="False" wizardImages="Images" wizardUsePageScroller="True">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Navigator>
				<Link id="7" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="P_CITY_COORDINATE_Insert" hrefSource="p_city_coordinate.ccp" removeParameters="P_CITY_COORDINATE_ID;FLAG;s_keyword;P_CITY_COORDINATEPage;P_CITY_COORDINATEPageSize;P_CITY_COORDINATEOrder;P_CITY_COORDINATEDir" wizardThemeItem="FooterA" wizardDefaultValue="Add New" wizardUseTemplateBlock="False" PathID="P_CITY_COORDINATEP_CITY_COORDINATE_Insert">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="90"/>
							</Actions>
						</Event>
					</Events>
					<LinkParameters>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Link id="91" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="DLink" PathID="P_CITY_COORDINATEDLink" hrefSource="p_city_coordinate.ccp" wizardUseTemplateBlock="True" removeParameters="FLAG" fieldSource="P_CITY_COORDINATE_ID">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="60" sourceType="DataField" name="P_CITY_COORDINATE_ID" source="P_CITY_COORDINATE_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Link id="61" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="True" hrefType="Page" urlType="Relative" preserveParameters="GET" name="ADLink" PathID="P_CITY_COORDINATEADLink" hrefSource="p_city_coordinate.ccp" wizardUseTemplateBlock="True" removeParameters="FLAG" fieldSource="P_CITY_COORDINATE_ID">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="62" sourceType="DataField" format="yyyy-mm-dd" name="P_CITY_COORDINATE_ID" source="P_CITY_COORDINATE_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Hidden id="26" visible="Yes" fieldSourceType="DBColumn" dataType="Float" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="P_CITY_COORDINATE_ID" fieldSource="P_CITY_COORDINATE_ID" wizardCaption="ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" hrefSource="p_city_coordinate.ccp" wizardThemeItem="GridA" PathID="P_CITY_COORDINATEP_CITY_COORDINATE_ID">
<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="27" sourceType="DataField" format="yyyy-mm-dd" name="P_CITY_COORDINATE_ID" source="P_CITY_COORDINATE_ID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Hidden>
</Components>
			<Events>
<Event name="BeforeShowRow" type="Server">
<Actions>
<Action actionName="Set Row Style" actionCategory="General" id="92" styles="Row;AltRow"/>
<Action actionName="Custom Code" actionCategory="General" id="93"/>
</Actions>
</Event>
</Events>
			<TableParameters>
				<TableParameter id="8" conditionType="Parameter" useIsNull="False" field="CODE" parameterSource="s_keyword" dataType="Text" logicOperator="Or" searchConditionType="Contains" parameterType="URL" orderNumber="1" leftBrackets="1"/>
				<TableParameter id="9" conditionType="Parameter" useIsNull="False" field="CITY_NAME" parameterSource="s_keyword" dataType="Text" logicOperator="Or" searchConditionType="Contains" parameterType="URL" orderNumber="2" rightBrackets="1"/>
			</TableParameters>
			<JoinTables/>
			<JoinLinks/>
			<Fields>
			</Fields>
			<SPParameters/>
			<SQLParameters>
<SQLParameter id="155" parameterType="URL" variable="s_keyword" dataType="Text" parameterSource="s_keyword"/>
</SQLParameters>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Grid>
		<Record id="3" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="P_CITY_COORDINATESearch" wizardCaption=" P CITY COORDINATE " wizardOrientation="Vertical" wizardFormMethod="post" returnPage="p_city_coordinate.ccp" PathID="P_CITY_COORDINATESearch" pasteActions="pasteActions">
			<Components>
				<TextBox id="5" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_keyword" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" PathID="P_CITY_COORDINATESearchs_keyword">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Button id="4" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" PathID="P_CITY_COORDINATESearchButton_DoSearch">
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
		<Record id="59" sourceType="SQL" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="Conn" name="p_city_coordinate1" dataSource="select a.*,b.code as p_country_name from p_city_coordinate a ,
p_country b
where a.p_country_id=b.p_country_id
and a.P_CITY_COORDINATE_ID={P_CITY_COORDINATE_ID}" errorSummator="Error" wizardCaption=" P City Coordinate " wizardFormMethod="post" PathID="p_city_coordinate1" pasteActions="pasteActions" customInsertType="SQL" parameterTypeListName="ParameterTypeList" activeCollection="SQLParameters" customInsert="INSERT INTO P_CITY_COORDINATE(P_CITY_COORDINATE_ID, CODE, CITY_NAME, P_COUNTRY_ID, EM_DEG, EM_MIN, EM_SEC, SL_DEG, SL_MIN, SL_SEC, TIME_REF, DESCRIPTION, CREATION_DATE, CREATED_BY, UPDATED_DATE, UPDATED_BY)
VALUES
(GENERATE_ID('TRB','P_CITY_COORDINATE','P_CITY_COORDINATE_ID'),UPPER(TRIM('{CODE}')),'{CITY_NAME}',{P_COUNTRY_ID},{EM_DEG},{EM_MIN},{EM_SEC},{SL_DEG},{SL_MIN},{SL_SEC},{TIME_REF},'{DESCRIPTION}',sysdate, '{CREATED_BY}',sysdate, '{UPDATED_BY}')" customUpdateType="SQL" customUpdate="UPDATE P_CITY_COORDINATE SET 
CODE=UPPER(TRIM('{CODE}')),
CITY_NAME='{CITY_NAME}',
P_COUNTRY_ID={P_COUNTRY_ID},
EM_DEG={EM_DEG},
EM_MIN={EM_MIN},
EM_SEC={EM_SEC},
SL_DEG={SL_DEG},
SL_MIN={SL_MIN},
SL_SEC={SL_SEC},
TIME_REF={TIME_REF},
DESCRIPTION=INITCAP(TRIM('{DESCRIPTION}')),
UPDATED_DATE=sysdate,
UPDATED_BY='{UPDATED_BY}' 
WHERE  P_CITY_COORDINATE_ID = {P_CITY_COORDINATE_ID}" customDeleteType="SQL" customDelete="DELETE FROM P_CITY_COORDINATE WHERE P_CITY_COORDINATE_ID = {P_CITY_COORDINATE_ID}">
			<Components>
				<TextBox id="66" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="CODE" fieldSource="CODE" required="True" caption="CODE" wizardCaption="CODE" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_city_coordinate1CODE">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="67" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="CITY_NAME" fieldSource="CITY_NAME" required="False" caption="CITY NAME" wizardCaption="CITY NAME" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_city_coordinate1CITY_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Hidden id="68" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_COUNTRY_ID" fieldSource="P_COUNTRY_ID" required="False" caption="P COUNTRY ID" wizardCaption="P COUNTRY ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_city_coordinate1P_COUNTRY_ID">
<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
<TextBox id="69" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="EM_DEG" fieldSource="EM_DEG" required="True" caption="EM DEG" wizardCaption="EM DEG" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_city_coordinate1EM_DEG">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="72" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="SL_DEG" fieldSource="SL_DEG" required="True" caption="SL DEG" wizardCaption="SL DEG" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_city_coordinate1SL_DEG">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="75" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="TIME_REF" fieldSource="TIME_REF" required="True" caption="TIME REF" wizardCaption="TIME REF" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_city_coordinate1TIME_REF">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextArea id="76" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="DESCRIPTION" fieldSource="DESCRIPTION" required="False" caption="DESCRIPTION" wizardCaption="DESCRIPTION" wizardSize="50" wizardMaxLength="128" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_city_coordinate1DESCRIPTION">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextArea>
				<TextBox id="79" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="CREATED_BY" fieldSource="CREATED_BY" required="True" caption="CREATED BY" wizardCaption="CREATED BY" wizardSize="16" wizardMaxLength="16" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_city_coordinate1CREATED_BY" defaultValue="CCGetUserLogin()">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="82" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="UPDATED_BY" fieldSource="UPDATED_BY" required="True" caption="UPDATED BY" wizardCaption="UPDATED BY" wizardSize="16" wizardMaxLength="16" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_city_coordinate1UPDATED_BY" defaultValue="CCGetUserLogin()">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="77" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="CREATION_DATE" fieldSource="CREATION_DATE" required="True" caption="CREATION DATE" wizardCaption="CREATION DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_city_coordinate1CREATION_DATE" format="dd-mmm-yyyy" defaultValue="date(&quot;d-M-Y&quot;)">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="80" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="UPDATED_DATE" fieldSource="UPDATED_DATE" required="True" caption="UPDATED DATE" wizardCaption="UPDATED DATE" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_city_coordinate1UPDATED_DATE" format="dd-mmm-yyyy" defaultValue="date(&quot;d-M-Y&quot;)">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="73" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="SL_MIN" fieldSource="SL_MIN" required="True" caption="SL MIN" wizardCaption="SL MIN" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_city_coordinate1SL_MIN">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="74" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="SL_SEC" fieldSource="SL_SEC" required="True" caption="SL SEC" wizardCaption="SL SEC" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_city_coordinate1SL_SEC">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="70" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="EM_MIN" fieldSource="EM_MIN" required="True" caption="EM MIN" wizardCaption="EM MIN" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_city_coordinate1EM_MIN">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="71" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="EM_SEC" fieldSource="EM_SEC" required="True" caption="EM SEC" wizardCaption="EM SEC" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_city_coordinate1EM_SEC">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Button id="83" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" wizardCaption="Add" PathID="p_city_coordinate1Button_Insert" removeParameters="TAMBAH;s_keyword">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="84" eventType="Client"/>
								<Action actionName="Confirmation Message" actionCategory="General" id="85" message="Anda Yakin Menyimpan Record Ini?" eventType="Client"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="86" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Update" operation="Update" wizardCaption="Submit" PathID="p_city_coordinate1Button_Update" removeParameters="TAMBAH">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Custom Code" actionCategory="General" id="51" eventType="Client"/>
								<Action actionName="Confirmation Message" actionCategory="General" id="87" message="Anda Yakin Mengubah Record Ini?" eventType="Client"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="53" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Delete" operation="Delete" wizardCaption="Delete" PathID="p_city_coordinate1Button_Delete" removeParameters="TAMBAH;P_APP_ROLE_ID;s_keyword;P_APP_ROLEPage">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Confirmation Message" actionCategory="General" id="88" message="Anda Yakin Menghapus Record Ini?" eventType="Client"/>
								<Action actionName="Custom Code" actionCategory="General" id="55" eventType="Client"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="89" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Cancel" operation="Cancel" wizardThemeItem="FooterIMG" wizardButtonImage="ButtonCancelOn" PathID="p_city_coordinate1Button_Cancel" removeParameters="FLAG">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Hidden id="151" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="P_CITY_COORDINATE_ID" fieldSource="P_CITY_COORDINATE_ID" required="False" caption="P_CITY_COORDINATE_ID" wizardCaption="CODE" wizardSize="50" wizardMaxLength="64" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_city_coordinate1P_CITY_COORDINATE_ID">
<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Hidden>
<TextBox id="154" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="P_COUNTRY_NAME" fieldSource="P_COUNTRY_NAME" required="False" caption="P COUNTRY ID" wizardCaption="P COUNTRY ID" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="p_city_coordinate1P_COUNTRY_NAME">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="65" conditionType="Parameter" useIsNull="False" field="P_CITY_COORDINATE_ID" parameterSource="P_CITY_COORDINATE_ID" dataType="Float" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="1"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters>
<SQLParameter id="156" parameterType="URL" variable="P_CITY_COORDINATE_ID" dataType="Float" parameterSource="P_CITY_COORDINATE_ID"/>
</SQLParameters>
			<JoinTables/>
			<JoinLinks/>
			<Fields/>
			<ISPParameters/>
			<ISQLParameters>
<SQLParameter id="111" variable="CODE" parameterType="Control" dataType="Text" parameterSource="CODE"/>
<SQLParameter id="112" variable="CITY_NAME" parameterType="Control" dataType="Text" parameterSource="CITY_NAME"/>
<SQLParameter id="113" variable="P_COUNTRY_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_COUNTRY_ID"/>
<SQLParameter id="114" variable="EM_DEG" parameterType="Control" dataType="Float" parameterSource="EM_DEG" defaultValue="0"/>
<SQLParameter id="115" variable="EM_MIN" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="EM_MIN"/>
<SQLParameter id="116" variable="EM_SEC" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="EM_SEC"/>
<SQLParameter id="117" variable="SL_DEG" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="SL_DEG"/>
<SQLParameter id="118" variable="SL_MIN" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="SL_MIN"/>
<SQLParameter id="119" variable="SL_SEC" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="SL_SEC"/>
<SQLParameter id="120" variable="TIME_REF" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="TIME_REF"/>
<SQLParameter id="121" variable="DESCRIPTION" parameterType="Control" dataType="Text" parameterSource="DESCRIPTION"/>
<SQLParameter id="122" variable="CREATED_BY" parameterType="Control" dataType="Text" parameterSource="CREATED_BY"/>
<SQLParameter id="123" variable="UPDATED_BY" parameterType="Control" dataType="Text" parameterSource="UPDATED_BY"/>
</ISQLParameters>
			<IFormElements>
<CustomParameter id="96" field="CODE" dataType="Text" parameterType="Control" parameterSource="CODE"/>
<CustomParameter id="97" field="CITY_NAME" dataType="Text" parameterType="Control" parameterSource="CITY_NAME"/>
<CustomParameter id="98" field="P_COUNTRY_ID" dataType="Float" parameterType="Control" parameterSource="P_COUNTRY_ID"/>
<CustomParameter id="99" field="EM_DEG" dataType="Float" parameterType="Control" parameterSource="EM_DEG"/>
<CustomParameter id="100" field="SL_DEG" dataType="Float" parameterType="Control" parameterSource="SL_DEG"/>
<CustomParameter id="101" field="TIME_REF" dataType="Float" parameterType="Control" parameterSource="TIME_REF"/>
<CustomParameter id="102" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
<CustomParameter id="103" field="CREATED_BY" dataType="Text" parameterType="Control" parameterSource="CREATED_BY"/>
<CustomParameter id="104" field="UPDATED_BY" dataType="Text" parameterType="Control" parameterSource="UPDATED_BY"/>
<CustomParameter id="105" field="CREATION_DATE" dataType="Date" parameterType="Control" parameterSource="CREATION_DATE"/>
<CustomParameter id="106" field="UPDATED_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATED_DATE"/>
<CustomParameter id="107" field="SL_MIN" dataType="Float" parameterType="Control" parameterSource="SL_MIN"/>
<CustomParameter id="108" field="SL_SEC" dataType="Float" parameterType="Control" parameterSource="SL_SEC"/>
<CustomParameter id="109" field="EM_MIN" dataType="Float" parameterType="Control" parameterSource="EM_MIN"/>
<CustomParameter id="110" field="EM_SEC" dataType="Float" parameterType="Control" parameterSource="EM_SEC"/>
</IFormElements>
			<USPParameters/>
			<USQLParameters>
<SQLParameter id="139" variable="CODE" parameterType="Control" dataType="Text" parameterSource="CODE"/>
<SQLParameter id="140" variable="CITY_NAME" parameterType="Control" dataType="Text" parameterSource="CITY_NAME"/>
<SQLParameter id="141" variable="P_COUNTRY_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_COUNTRY_ID"/>
<SQLParameter id="142" variable="EM_DEG" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="EM_DEG"/>
<SQLParameter id="143" variable="EM_MIN" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="EM_MIN"/>
<SQLParameter id="144" variable="EM_SEC" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="EM_SEC"/>
<SQLParameter id="145" variable="SL_DEG" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="SL_DEG"/>
<SQLParameter id="146" variable="SL_MIN" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="SL_MIN"/>
<SQLParameter id="147" variable="SL_SEC" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="SL_SEC"/>
<SQLParameter id="148" variable="TIME_REF" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="TIME_REF"/>
<SQLParameter id="149" variable="DESCRIPTION" parameterType="Control" dataType="Text" parameterSource="DESCRIPTION"/>
<SQLParameter id="150" variable="UPDATED_BY" parameterType="Control" dataType="Text" parameterSource="UPDATED_BY"/>
<SQLParameter id="152" variable="P_CITY_COORDINATE_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_CITY_COORDINATE_ID"/>
</USQLParameters>
			<UConditions/>
			<UFormElements>
<CustomParameter id="124" field="CODE" dataType="Text" parameterType="Control" parameterSource="CODE"/>
<CustomParameter id="125" field="CITY_NAME" dataType="Text" parameterType="Control" parameterSource="CITY_NAME"/>
<CustomParameter id="126" field="P_COUNTRY_ID" dataType="Float" parameterType="Control" parameterSource="P_COUNTRY_ID"/>
<CustomParameter id="127" field="EM_DEG" dataType="Float" parameterType="Control" parameterSource="EM_DEG"/>
<CustomParameter id="128" field="SL_DEG" dataType="Float" parameterType="Control" parameterSource="SL_DEG"/>
<CustomParameter id="129" field="TIME_REF" dataType="Float" parameterType="Control" parameterSource="TIME_REF"/>
<CustomParameter id="130" field="DESCRIPTION" dataType="Text" parameterType="Control" parameterSource="DESCRIPTION"/>
<CustomParameter id="131" field="CREATED_BY" dataType="Text" parameterType="Control" parameterSource="CREATED_BY"/>
<CustomParameter id="132" field="UPDATED_BY" dataType="Text" parameterType="Control" parameterSource="UPDATED_BY"/>
<CustomParameter id="133" field="CREATION_DATE" dataType="Date" parameterType="Control" parameterSource="CREATION_DATE" format="dd-mmm-yyyy"/>
<CustomParameter id="134" field="UPDATED_DATE" dataType="Date" parameterType="Control" parameterSource="UPDATED_DATE" format="dd-mmm-yyyy"/>
<CustomParameter id="135" field="SL_MIN" dataType="Float" parameterType="Control" parameterSource="SL_MIN"/>
<CustomParameter id="136" field="SL_SEC" dataType="Float" parameterType="Control" parameterSource="SL_SEC"/>
<CustomParameter id="137" field="EM_MIN" dataType="Float" parameterType="Control" parameterSource="EM_MIN"/>
<CustomParameter id="138" field="EM_SEC" dataType="Float" parameterType="Control" parameterSource="EM_SEC"/>
</UFormElements>
			<DSPParameters/>
			<DSQLParameters>
<SQLParameter id="153" variable="P_CITY_COORDINATE_ID" parameterType="Control" defaultValue="0" dataType="Float" parameterSource="P_CITY_COORDINATE_ID"/>
</DSQLParameters>
			<DConditions/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Record>
	</Components>
	<CodeFiles>
		<CodeFile id="Code" language="PHPTemplates" name="p_city_coordinate.php" forShow="True" url="p_city_coordinate.php" comment="//" codePage="windows-1252"/>
		<CodeFile id="Events" language="PHPTemplates" name="p_city_coordinate_events.php" forShow="False" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups/>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events>
<Event name="OnInitializeView" type="Server">
<Actions>
<Action actionName="Custom Code" actionCategory="General" id="94"/>
</Actions>
</Event>
<Event name="BeforeShow" type="Server">
<Actions>
<Action actionName="Custom Code" actionCategory="General" id="95"/>
</Actions>
</Event>
</Events>
</Page>
