<?php
//Include Common Files @1-EF0DD599
define("RelativePath", "..");
define("PathToCurrentPage", "/bil_param/");
define("FileName", "p_onetime_tariff_scenario.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

class clsGridP_ONETIME_TARIFF_SCENARIO { //P_ONETIME_TARIFF_SCENARIO class @2-F42C8461

//Variables @2-AC1EDBB9

    // Public variables
    var $ComponentType = "Grid";
    var $ComponentName;
    var $Visible;
    var $Errors;
    var $ErrorBlock;
    var $ds;
    var $DataSource;
    var $PageSize;
    var $IsEmpty;
    var $ForceIteration = false;
    var $HasRecord = false;
    var $SorterName = "";
    var $SorterDirection = "";
    var $PageNumber;
    var $RowNumber;
    var $ControlsVisible = array();

    var $CCSEvents = "";
    var $CCSEventResult;

    var $RelativePath = "";
    var $Attributes;

    // Grid Controls
    var $StaticControls;
    var $RowControls;
//End Variables

//Class_Initialize Event @2-5473F26C
    function clsGridP_ONETIME_TARIFF_SCENARIO($RelativePath, & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "P_ONETIME_TARIFF_SCENARIO";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Grid P_ONETIME_TARIFF_SCENARIO";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->DataSource = new clsP_ONETIME_TARIFF_SCENARIODataSource($this);
        $this->ds = & $this->DataSource;
        $this->PageSize = CCGetParam($this->ComponentName . "PageSize", "");
        if(!is_numeric($this->PageSize) || !strlen($this->PageSize))
            $this->PageSize = 10;
        else
            $this->PageSize = intval($this->PageSize);
        if ($this->PageSize > 100)
            $this->PageSize = 100;
        if($this->PageSize == 0)
            $this->Errors->addError("<p>Form: Grid " . $this->ComponentName . "<br>Error: (CCS06) Invalid page size.</p>");
        $this->PageNumber = intval(CCGetParam($this->ComponentName . "Page", 1));
        if ($this->PageNumber <= 0) $this->PageNumber = 1;

        $this->CODE = & new clsControl(ccsLabel, "CODE", "CODE", ccsText, "", CCGetRequestParam("CODE", ccsGet, NULL), $this);
        $this->P_SERVICE_TYPE_NAME = & new clsControl(ccsLabel, "P_SERVICE_TYPE_NAME", "P_SERVICE_TYPE_NAME", ccsText, "", CCGetRequestParam("P_SERVICE_TYPE_NAME", ccsGet, NULL), $this);
        $this->VALID_FROM = & new clsControl(ccsLabel, "VALID_FROM", "VALID_FROM", ccsText, "", CCGetRequestParam("VALID_FROM", ccsGet, NULL), $this);
        $this->VALID_TO = & new clsControl(ccsLabel, "VALID_TO", "VALID_TO", ccsText, "", CCGetRequestParam("VALID_TO", ccsGet, NULL), $this);
        $this->DLink = & new clsControl(ccsLink, "DLink", "DLink", ccsText, "", CCGetRequestParam("DLink", ccsGet, NULL), $this);
        $this->DLink->HTML = true;
        $this->DLink->Page = "p_onetime_tariff_scenario.php";
        $this->P_ONETIME_TARIFF_SCENARIO_ID = & new clsControl(ccsHidden, "P_ONETIME_TARIFF_SCENARIO_ID", "P_ONETIME_TARIFF_SCENARIO_ID", ccsFloat, "", CCGetRequestParam("P_ONETIME_TARIFF_SCENARIO_ID", ccsGet, NULL), $this);
        $this->Navigator = & new clsNavigator($this->ComponentName, "Navigator", $FileName, 5, tpCentered, $this);
        $this->Navigator->PageSizes = array("1", "5", "10", "25", "50");
        $this->P_ONETIME_TARIFF_SCENARIO_Insert = & new clsControl(ccsLink, "P_ONETIME_TARIFF_SCENARIO_Insert", "P_ONETIME_TARIFF_SCENARIO_Insert", ccsText, "", CCGetRequestParam("P_ONETIME_TARIFF_SCENARIO_Insert", ccsGet, NULL), $this);
        $this->P_ONETIME_TARIFF_SCENARIO_Insert->Page = "p_tariff_scenario.php";
    }
//End Class_Initialize Event

//Initialize Method @2-90E704C5
    function Initialize()
    {
        if(!$this->Visible) return;

        $this->DataSource->PageSize = & $this->PageSize;
        $this->DataSource->AbsolutePage = & $this->PageNumber;
        $this->DataSource->SetOrder($this->SorterName, $this->SorterDirection);
    }
//End Initialize Method

//Show Method @2-B27347EF
    function Show()
    {
        global $Tpl;
        global $CCSLocales;
        if(!$this->Visible) return;

        $this->RowNumber = 0;

        $this->DataSource->Parameters["urls_keyword"] = CCGetFromGet("s_keyword", NULL);

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeSelect", $this);


        $this->DataSource->Prepare();
        $this->DataSource->Open();
        $this->HasRecord = $this->DataSource->has_next_record();
        $this->IsEmpty = ! $this->HasRecord;
        $this->Attributes->Show();

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShow", $this);
        if(!$this->Visible) return;

        $GridBlock = "Grid " . $this->ComponentName;
        $ParentPath = $Tpl->block_path;
        $Tpl->block_path = $ParentPath . "/" . $GridBlock;


        if (!$this->IsEmpty) {
            $this->ControlsVisible["CODE"] = $this->CODE->Visible;
            $this->ControlsVisible["P_SERVICE_TYPE_NAME"] = $this->P_SERVICE_TYPE_NAME->Visible;
            $this->ControlsVisible["VALID_FROM"] = $this->VALID_FROM->Visible;
            $this->ControlsVisible["VALID_TO"] = $this->VALID_TO->Visible;
            $this->ControlsVisible["DLink"] = $this->DLink->Visible;
            $this->ControlsVisible["P_ONETIME_TARIFF_SCENARIO_ID"] = $this->P_ONETIME_TARIFF_SCENARIO_ID->Visible;
            while ($this->ForceIteration || (($this->RowNumber < $this->PageSize) &&  ($this->HasRecord = $this->DataSource->has_next_record()))) {
                $this->RowNumber++;
                if ($this->HasRecord) {
                    $this->DataSource->next_record();
                    $this->DataSource->SetValues();
                }
                $Tpl->block_path = $ParentPath . "/" . $GridBlock . "/Row";
                $this->CODE->SetValue($this->DataSource->CODE->GetValue());
                $this->P_SERVICE_TYPE_NAME->SetValue($this->DataSource->P_SERVICE_TYPE_NAME->GetValue());
                $this->VALID_FROM->SetValue($this->DataSource->VALID_FROM->GetValue());
                $this->VALID_TO->SetValue($this->DataSource->VALID_TO->GetValue());
                $this->DLink->Parameters = CCGetQueryString("QueryString", array("FLAG", "ccsForm"));
                $this->DLink->Parameters = CCAddParam($this->DLink->Parameters, "P_ONETIME_TARIFF_SCENARIO_ID", $this->DataSource->f("P_ONETIME_TARIFF_SCENARIO_ID"));
                $this->P_ONETIME_TARIFF_SCENARIO_ID->SetValue($this->DataSource->P_ONETIME_TARIFF_SCENARIO_ID->GetValue());
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->CODE->Show();
                $this->P_SERVICE_TYPE_NAME->Show();
                $this->VALID_FROM->Show();
                $this->VALID_TO->Show();
                $this->DLink->Show();
                $this->P_ONETIME_TARIFF_SCENARIO_ID->Show();
                $Tpl->block_path = $ParentPath . "/" . $GridBlock;
                $Tpl->parse("Row", true);
            }
        }
        else { // Show NoRecords block if no records are found
            $this->Attributes->Show();
            $Tpl->parse("NoRecords", false);
        }

        $errors = $this->GetErrors();
        if(strlen($errors))
        {
            $Tpl->replaceblock("", $errors);
            $Tpl->block_path = $ParentPath;
            return;
        }
        $this->Navigator->PageNumber = $this->DataSource->AbsolutePage;
        $this->Navigator->PageSize = $this->PageSize;
        if ($this->DataSource->RecordsCount == "CCS not counted")
            $this->Navigator->TotalPages = $this->DataSource->AbsolutePage + ($this->DataSource->next_record() ? 1 : 0);
        else
            $this->Navigator->TotalPages = $this->DataSource->PageCount();
        if ($this->Navigator->TotalPages <= 1) {
            $this->Navigator->Visible = false;
        }
        $this->P_ONETIME_TARIFF_SCENARIO_Insert->Parameters = CCGetQueryString("QueryString", array("P_TARIFF_SCENARIO_ID", "ccsForm"));
        $this->P_ONETIME_TARIFF_SCENARIO_Insert->Parameters = CCAddParam($this->P_ONETIME_TARIFF_SCENARIO_Insert->Parameters, "FLAG", "ADD");
        $this->Navigator->Show();
        $this->P_ONETIME_TARIFF_SCENARIO_Insert->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

//GetErrors Method @2-CCA7E289
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->CODE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->P_SERVICE_TYPE_NAME->Errors->ToString());
        $errors = ComposeStrings($errors, $this->VALID_FROM->Errors->ToString());
        $errors = ComposeStrings($errors, $this->VALID_TO->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DLink->Errors->ToString());
        $errors = ComposeStrings($errors, $this->P_ONETIME_TARIFF_SCENARIO_ID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End P_ONETIME_TARIFF_SCENARIO Class @2-FCB6E20C

class clsP_ONETIME_TARIFF_SCENARIODataSource extends clsDBConn {  //P_ONETIME_TARIFF_SCENARIODataSource Class @2-D0ED3BCD

//DataSource Variables @2-2BE6720A
    var $Parent = "";
    var $CCSEvents = "";
    var $CCSEventResult;
    var $ErrorBlock;
    var $CmdExecution;

    var $CountSQL;
    var $wp;


    // Datasource fields
    var $CODE;
    var $P_SERVICE_TYPE_NAME;
    var $VALID_FROM;
    var $VALID_TO;
    var $P_ONETIME_TARIFF_SCENARIO_ID;
//End DataSource Variables

//DataSourceClass_Initialize Event @2-D4E47E67
    function clsP_ONETIME_TARIFF_SCENARIODataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid P_ONETIME_TARIFF_SCENARIO";
        $this->Initialize();
        $this->CODE = new clsField("CODE", ccsText, "");
        
        $this->P_SERVICE_TYPE_NAME = new clsField("P_SERVICE_TYPE_NAME", ccsText, "");
        
        $this->VALID_FROM = new clsField("VALID_FROM", ccsText, "");
        
        $this->VALID_TO = new clsField("VALID_TO", ccsText, "");
        
        $this->P_ONETIME_TARIFF_SCENARIO_ID = new clsField("P_ONETIME_TARIFF_SCENARIO_ID", ccsFloat, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @2-9E1383D1
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            "");
    }
//End SetOrder Method

//Prepare Method @2-25AA94A2
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urls_keyword", ccsText, "", "", $this->Parameters["urls_keyword"], "", false);
    }
//End Prepare Method

//Open Method @2-3C92A693
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*) FROM (SELECT \n" .
        "A.P_ONETIME_TARIFF_SCENARIO_ID,\n" .
        "A.CODE,\n" .
        "A.P_SERVICE_TYPE_ID,\n" .
        "TO_CHAR(A.VALID_FROM,'DD/MM/YYYY') AS VALID_FROM,\n" .
        "TO_CHAR(A.VALID_TO,'DD/MM/YYYY') AS VALID_TO, \n" .
        "A.DESCRIPTION, \n" .
        "A.UPDATE_DATE, \n" .
        "A.UPDATE_BY,\n" .
        "B.CODE AS P_SERVICE_TYPE_NAME\n" .
        "FROM P_ONETIME_TARIFF_SCENARIO A ,P_SERVICE_TYPE B \n" .
        "WHERE A.P_SERVICE_TYPE_ID=B.P_SERVICE_TYPE_ID\n" .
        "AND UPPER(A.CODE) LIKE UPPER('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%')) cnt";
        $this->SQL = "SELECT \n" .
        "A.P_ONETIME_TARIFF_SCENARIO_ID,\n" .
        "A.CODE,\n" .
        "A.P_SERVICE_TYPE_ID,\n" .
        "TO_CHAR(A.VALID_FROM,'DD/MM/YYYY') AS VALID_FROM,\n" .
        "TO_CHAR(A.VALID_TO,'DD/MM/YYYY') AS VALID_TO, \n" .
        "A.DESCRIPTION, \n" .
        "A.UPDATE_DATE, \n" .
        "A.UPDATE_BY,\n" .
        "B.CODE AS P_SERVICE_TYPE_NAME\n" .
        "FROM P_ONETIME_TARIFF_SCENARIO A ,P_SERVICE_TYPE B \n" .
        "WHERE A.P_SERVICE_TYPE_ID=B.P_SERVICE_TYPE_ID\n" .
        "AND UPPER(A.CODE) LIKE UPPER('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%')";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        if ($this->CountSQL) 
            $this->RecordsCount = CCGetDBValue(CCBuildSQL($this->CountSQL, $this->Where, ""), $this);
        else
            $this->RecordsCount = "CCS not counted";
        $this->query(CCBuildSQL($this->SQL, $this->Where, $this->Order));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
        $this->MoveToPage($this->AbsolutePage);
    }
//End Open Method

//SetValues Method @2-F5DF12CA
    function SetValues()
    {
        $this->CODE->SetDBValue($this->f("CODE"));
        $this->P_SERVICE_TYPE_NAME->SetDBValue($this->f("P_SERVICE_TYPE_NAME"));
        $this->VALID_FROM->SetDBValue($this->f("VALID_FROM"));
        $this->VALID_TO->SetDBValue($this->f("VALID_TO"));
        $this->P_ONETIME_TARIFF_SCENARIO_ID->SetDBValue(trim($this->f("P_ONETIME_TARIFF_SCENARIO_ID")));
    }
//End SetValues Method

} //End P_ONETIME_TARIFF_SCENARIODataSource Class @2-FCB6E20C

class clsRecordP_ONETIME_TARIFF_SCENARIOSearch { //P_ONETIME_TARIFF_SCENARIOSearch Class @3-ACD718E5

//Variables @3-D6FF3E86

    // Public variables
    var $ComponentType = "Record";
    var $ComponentName;
    var $Parent;
    var $HTMLFormAction;
    var $PressedButton;
    var $Errors;
    var $ErrorBlock;
    var $FormSubmitted;
    var $FormEnctype;
    var $Visible;
    var $IsEmpty;

    var $CCSEvents = "";
    var $CCSEventResult;

    var $RelativePath = "";

    var $InsertAllowed = false;
    var $UpdateAllowed = false;
    var $DeleteAllowed = false;
    var $ReadAllowed   = false;
    var $EditMode      = false;
    var $ds;
    var $DataSource;
    var $ValidatingControls;
    var $Controls;
    var $Attributes;

    // Class variables
//End Variables

//Class_Initialize Event @3-3A2C18A4
    function clsRecordP_ONETIME_TARIFF_SCENARIOSearch($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record P_ONETIME_TARIFF_SCENARIOSearch/Error";
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "P_ONETIME_TARIFF_SCENARIOSearch";
            $this->Attributes = new clsAttributes($this->ComponentName . ":");
            $CCSForm = explode(":", CCGetFromGet("ccsForm", ""), 2);
            if(sizeof($CCSForm) == 1)
                $CCSForm[1] = "";
            list($FormName, $FormMethod) = $CCSForm;
            $this->FormEnctype = "application/x-www-form-urlencoded";
            $this->FormSubmitted = ($FormName == $this->ComponentName);
            $Method = $this->FormSubmitted ? ccsPost : ccsGet;
            $this->s_keyword = & new clsControl(ccsTextBox, "s_keyword", "s_keyword", ccsText, "", CCGetRequestParam("s_keyword", $Method, NULL), $this);
            $this->Button_DoSearch = & new clsButton("Button_DoSearch", $Method, $this);
        }
    }
//End Class_Initialize Event

//Validate Method @3-A144A629
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->s_keyword->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->s_keyword->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @3-D6729123
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->s_keyword->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//MasterDetail @3-ED598703
function SetPrimaryKeys($keyArray)
{
    $this->PrimaryKeys = $keyArray;
}
function GetPrimaryKeys()
{
    return $this->PrimaryKeys;
}
function GetPrimaryKey($keyName)
{
    return $this->PrimaryKeys[$keyName];
}
//End MasterDetail

//Operation Method @3-A8ADFE5C
    function Operation()
    {
        if(!$this->Visible)
            return;

        global $Redirect;
        global $FileName;

        if(!$this->FormSubmitted) {
            return;
        }

        if($this->FormSubmitted) {
            $this->PressedButton = "Button_DoSearch";
            if($this->Button_DoSearch->Pressed) {
                $this->PressedButton = "Button_DoSearch";
            }
        }
        $Redirect = "p_onetime_tariff_scenario.php";
        if($this->Validate()) {
            if($this->PressedButton == "Button_DoSearch") {
                $Redirect = "p_onetime_tariff_scenario.php" . "?" . CCMergeQueryStrings(CCGetQueryString("Form", array("Button_DoSearch", "Button_DoSearch_x", "Button_DoSearch_y")));
                if(!CCGetEvent($this->Button_DoSearch->CCSEvents, "OnClick", $this->Button_DoSearch)) {
                    $Redirect = "";
                }
            }
        } else {
            $Redirect = "";
        }
    }
//End Operation Method

//Show Method @3-7913FA87
    function Show()
    {
        global $CCSUseAmp;
        global $Tpl;
        global $FileName;
        global $CCSLocales;
        $Error = "";

        if(!$this->Visible)
            return;

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeSelect", $this);


        $RecordBlock = "Record " . $this->ComponentName;
        $ParentPath = $Tpl->block_path;
        $Tpl->block_path = $ParentPath . "/" . $RecordBlock;
        $this->EditMode = $this->EditMode && $this->ReadAllowed;
        if (!$this->FormSubmitted) {
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->s_keyword->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Errors->ToString());
            $Tpl->SetVar("Error", $Error);
            $Tpl->Parse("Error", false);
        }
        $CCSForm = $this->EditMode ? $this->ComponentName . ":" . "Edit" : $this->ComponentName;
        $this->HTMLFormAction = $FileName . "?" . CCAddParam(CCGetQueryString("QueryString", ""), "ccsForm", $CCSForm);
        $Tpl->SetVar("Action", !$CCSUseAmp ? $this->HTMLFormAction : str_replace("&", "&amp;", $this->HTMLFormAction));
        $Tpl->SetVar("HTMLFormName", $this->ComponentName);
        $Tpl->SetVar("HTMLFormEnctype", $this->FormEnctype);

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShow", $this);
        $this->Attributes->Show();
        if(!$this->Visible) {
            $Tpl->block_path = $ParentPath;
            return;
        }

        $this->s_keyword->Show();
        $this->Button_DoSearch->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
    }
//End Show Method

} //End P_ONETIME_TARIFF_SCENARIOSearch Class @3-FCB6E20C

class clsRecordP_ONETIME_TARIFF_SCENARIO1 { //P_ONETIME_TARIFF_SCENARIO1 Class @25-A8E32518

//Variables @25-D6FF3E86

    // Public variables
    var $ComponentType = "Record";
    var $ComponentName;
    var $Parent;
    var $HTMLFormAction;
    var $PressedButton;
    var $Errors;
    var $ErrorBlock;
    var $FormSubmitted;
    var $FormEnctype;
    var $Visible;
    var $IsEmpty;

    var $CCSEvents = "";
    var $CCSEventResult;

    var $RelativePath = "";

    var $InsertAllowed = false;
    var $UpdateAllowed = false;
    var $DeleteAllowed = false;
    var $ReadAllowed   = false;
    var $EditMode      = false;
    var $ds;
    var $DataSource;
    var $ValidatingControls;
    var $Controls;
    var $Attributes;

    // Class variables
//End Variables

//Class_Initialize Event @25-C22CC66F
    function clsRecordP_ONETIME_TARIFF_SCENARIO1($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record P_ONETIME_TARIFF_SCENARIO1/Error";
        $this->DataSource = new clsP_ONETIME_TARIFF_SCENARIO1DataSource($this);
        $this->ds = & $this->DataSource;
        $this->InsertAllowed = true;
        $this->UpdateAllowed = true;
        $this->DeleteAllowed = true;
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "P_ONETIME_TARIFF_SCENARIO1";
            $this->Attributes = new clsAttributes($this->ComponentName . ":");
            $CCSForm = explode(":", CCGetFromGet("ccsForm", ""), 2);
            if(sizeof($CCSForm) == 1)
                $CCSForm[1] = "";
            list($FormName, $FormMethod) = $CCSForm;
            $this->EditMode = ($FormMethod == "Edit");
            $this->FormEnctype = "application/x-www-form-urlencoded";
            $this->FormSubmitted = ($FormName == $this->ComponentName);
            $Method = $this->FormSubmitted ? ccsPost : ccsGet;
            $this->CODE = & new clsControl(ccsTextBox, "CODE", "CODE", ccsText, "", CCGetRequestParam("CODE", $Method, NULL), $this);
            $this->CODE->Required = true;
            $this->VALID_FROM = & new clsControl(ccsTextBox, "VALID_FROM", "VALID FROM", ccsText, "", CCGetRequestParam("VALID_FROM", $Method, NULL), $this);
            $this->VALID_FROM->Required = true;
            $this->DatePicker_VALID_FROM = & new clsDatePicker("DatePicker_VALID_FROM", "P_ONETIME_TARIFF_SCENARIO1", "VALID_FROM", $this);
            $this->DESCRIPTION = & new clsControl(ccsTextArea, "DESCRIPTION", "DESCRIPTION", ccsText, "", CCGetRequestParam("DESCRIPTION", $Method, NULL), $this);
            $this->UPDATE_DATE = & new clsControl(ccsTextBox, "UPDATE_DATE", "UPDATE DATE", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("UPDATE_DATE", $Method, NULL), $this);
            $this->UPDATE_DATE->Required = true;
            $this->DatePicker_UPDATE_DATE = & new clsDatePicker("DatePicker_UPDATE_DATE", "P_ONETIME_TARIFF_SCENARIO1", "UPDATE_DATE", $this);
            $this->VALID_TO = & new clsControl(ccsTextBox, "VALID_TO", "VALID TO", ccsText, "", CCGetRequestParam("VALID_TO", $Method, NULL), $this);
            $this->DatePicker_VALID_TO = & new clsDatePicker("DatePicker_VALID_TO", "P_ONETIME_TARIFF_SCENARIO1", "VALID_TO", $this);
            $this->UPDATE_BY = & new clsControl(ccsTextBox, "UPDATE_BY", "UPDATE BY", ccsText, "", CCGetRequestParam("UPDATE_BY", $Method, NULL), $this);
            $this->UPDATE_BY->Required = true;
            $this->Button_Insert = & new clsButton("Button_Insert", $Method, $this);
            $this->Button_Update = & new clsButton("Button_Update", $Method, $this);
            $this->Button_Delete = & new clsButton("Button_Delete", $Method, $this);
            $this->Button_Cancel = & new clsButton("Button_Cancel", $Method, $this);
            $this->P_ONETIME_TARIFF_SCENARIO_ID = & new clsControl(ccsHidden, "P_ONETIME_TARIFF_SCENARIO_ID", "CODE", ccsFloat, "", CCGetRequestParam("P_ONETIME_TARIFF_SCENARIO_ID", $Method, NULL), $this);
            $this->P_SERVICE_TYPE_ID = & new clsControl(ccsHidden, "P_SERVICE_TYPE_ID", "P SERVICE TYPE ID", ccsFloat, "", CCGetRequestParam("P_SERVICE_TYPE_ID", $Method, NULL), $this);
            $this->P_SERVICE_TYPE_ID->Required = true;
            $this->P_SERVICE_TYPE_NAME = & new clsControl(ccsTextBox, "P_SERVICE_TYPE_NAME", "P_SERVICE_TYPE_NAME", ccsText, "", CCGetRequestParam("P_SERVICE_TYPE_NAME", $Method, NULL), $this);
            if(!$this->FormSubmitted) {
                if(!is_array($this->UPDATE_DATE->Value) && !strlen($this->UPDATE_DATE->Value) && $this->UPDATE_DATE->Value !== false)
                    $this->UPDATE_DATE->SetText(date("d-M-Y"));
                if(!is_array($this->UPDATE_BY->Value) && !strlen($this->UPDATE_BY->Value) && $this->UPDATE_BY->Value !== false)
                    $this->UPDATE_BY->SetText(CCGetUserLogin());
            }
        }
    }
//End Class_Initialize Event

//Initialize Method @25-24496C6A
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["urlP_ONETIME_TARIFF_SCENARIO_ID"] = CCGetFromGet("P_ONETIME_TARIFF_SCENARIO_ID", NULL);
    }
//End Initialize Method

//Validate Method @25-41E9616C
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->CODE->Validate() && $Validation);
        $Validation = ($this->VALID_FROM->Validate() && $Validation);
        $Validation = ($this->DESCRIPTION->Validate() && $Validation);
        $Validation = ($this->UPDATE_DATE->Validate() && $Validation);
        $Validation = ($this->VALID_TO->Validate() && $Validation);
        $Validation = ($this->UPDATE_BY->Validate() && $Validation);
        $Validation = ($this->P_ONETIME_TARIFF_SCENARIO_ID->Validate() && $Validation);
        $Validation = ($this->P_SERVICE_TYPE_ID->Validate() && $Validation);
        $Validation = ($this->P_SERVICE_TYPE_NAME->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->CODE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->VALID_FROM->Errors->Count() == 0);
        $Validation =  $Validation && ($this->DESCRIPTION->Errors->Count() == 0);
        $Validation =  $Validation && ($this->UPDATE_DATE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->VALID_TO->Errors->Count() == 0);
        $Validation =  $Validation && ($this->UPDATE_BY->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_ONETIME_TARIFF_SCENARIO_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_SERVICE_TYPE_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_SERVICE_TYPE_NAME->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @25-5DA75B5D
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->CODE->Errors->Count());
        $errors = ($errors || $this->VALID_FROM->Errors->Count());
        $errors = ($errors || $this->DatePicker_VALID_FROM->Errors->Count());
        $errors = ($errors || $this->DESCRIPTION->Errors->Count());
        $errors = ($errors || $this->UPDATE_DATE->Errors->Count());
        $errors = ($errors || $this->DatePicker_UPDATE_DATE->Errors->Count());
        $errors = ($errors || $this->VALID_TO->Errors->Count());
        $errors = ($errors || $this->DatePicker_VALID_TO->Errors->Count());
        $errors = ($errors || $this->UPDATE_BY->Errors->Count());
        $errors = ($errors || $this->P_ONETIME_TARIFF_SCENARIO_ID->Errors->Count());
        $errors = ($errors || $this->P_SERVICE_TYPE_ID->Errors->Count());
        $errors = ($errors || $this->P_SERVICE_TYPE_NAME->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//MasterDetail @25-ED598703
function SetPrimaryKeys($keyArray)
{
    $this->PrimaryKeys = $keyArray;
}
function GetPrimaryKeys()
{
    return $this->PrimaryKeys;
}
function GetPrimaryKey($keyName)
{
    return $this->PrimaryKeys[$keyName];
}
//End MasterDetail

//Operation Method @25-872C026F
    function Operation()
    {
        if(!$this->Visible)
            return;

        global $Redirect;
        global $FileName;

        $this->DataSource->Prepare();
        if(!$this->FormSubmitted) {
            $this->EditMode = $this->DataSource->AllParametersSet;
            return;
        }

        if($this->FormSubmitted) {
            $this->PressedButton = $this->EditMode ? "Button_Update" : "Button_Insert";
            if($this->Button_Insert->Pressed) {
                $this->PressedButton = "Button_Insert";
            } else if($this->Button_Update->Pressed) {
                $this->PressedButton = "Button_Update";
            } else if($this->Button_Delete->Pressed) {
                $this->PressedButton = "Button_Delete";
            } else if($this->Button_Cancel->Pressed) {
                $this->PressedButton = "Button_Cancel";
            }
        }
        $Redirect = $FileName . "?" . CCGetQueryString("QueryString", array("ccsForm"));
        if($this->PressedButton == "Button_Delete") {
            $Redirect = $FileName . "?" . CCGetQueryString("QueryString", array("ccsForm", "TAMBAH", "s_keyword"));
            if(!CCGetEvent($this->Button_Delete->CCSEvents, "OnClick", $this->Button_Delete) || !$this->DeleteRow()) {
                $Redirect = "";
            }
        } else if($this->PressedButton == "Button_Cancel") {
            $Redirect = $FileName . "?" . CCGetQueryString("QueryString", array("ccsForm", "TAMBAH", "s_keyword", "P_AR_SEGMENTPage"));
            if(!CCGetEvent($this->Button_Cancel->CCSEvents, "OnClick", $this->Button_Cancel)) {
                $Redirect = "";
            }
        } else if($this->Validate()) {
            if($this->PressedButton == "Button_Insert") {
                $Redirect = $FileName . "?" . CCGetQueryString("QueryString", array("ccsForm", "TAMBAH", "s_keyword"));
                if(!CCGetEvent($this->Button_Insert->CCSEvents, "OnClick", $this->Button_Insert) || !$this->InsertRow()) {
                    $Redirect = "";
                }
            } else if($this->PressedButton == "Button_Update") {
                $Redirect = $FileName . "?" . CCGetQueryString("QueryString", array("ccsForm", "FLAG"));
                if(!CCGetEvent($this->Button_Update->CCSEvents, "OnClick", $this->Button_Update) || !$this->UpdateRow()) {
                    $Redirect = "";
                }
            }
        } else {
            $Redirect = "";
        }
        if ($Redirect)
            $this->DataSource->close();
    }
//End Operation Method

//InsertRow Method @25-474C6F7E
    function InsertRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeInsert", $this);
        if(!$this->InsertAllowed) return false;
        $this->DataSource->CODE->SetValue($this->CODE->GetValue(true));
        $this->DataSource->P_SERVICE_TYPE_ID->SetValue($this->P_SERVICE_TYPE_ID->GetValue(true));
        $this->DataSource->VALID_FROM->SetValue($this->VALID_FROM->GetValue(true));
        $this->DataSource->VALID_TO->SetValue($this->VALID_TO->GetValue(true));
        $this->DataSource->DESCRIPTION->SetValue($this->DESCRIPTION->GetValue(true));
        $this->DataSource->UPDATE_BY->SetValue($this->UPDATE_BY->GetValue(true));
        $this->DataSource->Insert();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterInsert", $this);
        return (!$this->CheckErrors());
    }
//End InsertRow Method

//UpdateRow Method @25-1EC26AC3
    function UpdateRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeUpdate", $this);
        if(!$this->UpdateAllowed) return false;
        $this->DataSource->CODE->SetValue($this->CODE->GetValue(true));
        $this->DataSource->P_SERVICE_TYPE_ID->SetValue($this->P_SERVICE_TYPE_ID->GetValue(true));
        $this->DataSource->VALID_FROM->SetValue($this->VALID_FROM->GetValue(true));
        $this->DataSource->VALID_TO->SetValue($this->VALID_TO->GetValue(true));
        $this->DataSource->DESCRIPTION->SetValue($this->DESCRIPTION->GetValue(true));
        $this->DataSource->UPDATE_BY->SetValue($this->UPDATE_BY->GetValue(true));
        $this->DataSource->P_ONETIME_TARIFF_SCENARIO_ID->SetValue($this->P_ONETIME_TARIFF_SCENARIO_ID->GetValue(true));
        $this->DataSource->Update();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterUpdate", $this);
        return (!$this->CheckErrors());
    }
//End UpdateRow Method

//DeleteRow Method @25-39051A62
    function DeleteRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeDelete", $this);
        if(!$this->DeleteAllowed) return false;
        $this->DataSource->P_ONETIME_TARIFF_SCENARIO_ID->SetValue($this->P_ONETIME_TARIFF_SCENARIO_ID->GetValue(true));
        $this->DataSource->Delete();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterDelete", $this);
        return (!$this->CheckErrors());
    }
//End DeleteRow Method

//Show Method @25-6E4594EA
    function Show()
    {
        global $CCSUseAmp;
        global $Tpl;
        global $FileName;
        global $CCSLocales;
        $Error = "";

        if(!$this->Visible)
            return;

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeSelect", $this);


        $RecordBlock = "Record " . $this->ComponentName;
        $ParentPath = $Tpl->block_path;
        $Tpl->block_path = $ParentPath . "/" . $RecordBlock;
        $this->EditMode = $this->EditMode && $this->ReadAllowed;
        if($this->EditMode) {
            if($this->DataSource->Errors->Count()){
                $this->Errors->AddErrors($this->DataSource->Errors);
                $this->DataSource->Errors->clear();
            }
            $this->DataSource->Open();
            if($this->DataSource->Errors->Count() == 0 && $this->DataSource->next_record()) {
                $this->DataSource->SetValues();
                if(!$this->FormSubmitted){
                    $this->CODE->SetValue($this->DataSource->CODE->GetValue());
                    $this->VALID_FROM->SetValue($this->DataSource->VALID_FROM->GetValue());
                    $this->DESCRIPTION->SetValue($this->DataSource->DESCRIPTION->GetValue());
                    $this->UPDATE_DATE->SetValue($this->DataSource->UPDATE_DATE->GetValue());
                    $this->VALID_TO->SetValue($this->DataSource->VALID_TO->GetValue());
                    $this->UPDATE_BY->SetValue($this->DataSource->UPDATE_BY->GetValue());
                    $this->P_ONETIME_TARIFF_SCENARIO_ID->SetValue($this->DataSource->P_ONETIME_TARIFF_SCENARIO_ID->GetValue());
                    $this->P_SERVICE_TYPE_ID->SetValue($this->DataSource->P_SERVICE_TYPE_ID->GetValue());
                    $this->P_SERVICE_TYPE_NAME->SetValue($this->DataSource->P_SERVICE_TYPE_NAME->GetValue());
                }
            } else {
                $this->EditMode = false;
            }
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->CODE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->VALID_FROM->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DatePicker_VALID_FROM->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DESCRIPTION->Errors->ToString());
            $Error = ComposeStrings($Error, $this->UPDATE_DATE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DatePicker_UPDATE_DATE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->VALID_TO->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DatePicker_VALID_TO->Errors->ToString());
            $Error = ComposeStrings($Error, $this->UPDATE_BY->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_ONETIME_TARIFF_SCENARIO_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_SERVICE_TYPE_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_SERVICE_TYPE_NAME->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DataSource->Errors->ToString());
            $Tpl->SetVar("Error", $Error);
            $Tpl->Parse("Error", false);
        }
        $CCSForm = $this->EditMode ? $this->ComponentName . ":" . "Edit" : $this->ComponentName;
        $this->HTMLFormAction = $FileName . "?" . CCAddParam(CCGetQueryString("QueryString", ""), "ccsForm", $CCSForm);
        $Tpl->SetVar("Action", !$CCSUseAmp ? $this->HTMLFormAction : str_replace("&", "&amp;", $this->HTMLFormAction));
        $Tpl->SetVar("HTMLFormName", $this->ComponentName);
        $Tpl->SetVar("HTMLFormEnctype", $this->FormEnctype);
        $this->Button_Insert->Visible = !$this->EditMode && $this->InsertAllowed;
        $this->Button_Update->Visible = $this->EditMode && $this->UpdateAllowed;
        $this->Button_Delete->Visible = $this->EditMode && $this->DeleteAllowed;

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShow", $this);
        $this->Attributes->Show();
        if(!$this->Visible) {
            $Tpl->block_path = $ParentPath;
            return;
        }

        $this->CODE->Show();
        $this->VALID_FROM->Show();
        $this->DatePicker_VALID_FROM->Show();
        $this->DESCRIPTION->Show();
        $this->UPDATE_DATE->Show();
        $this->DatePicker_UPDATE_DATE->Show();
        $this->VALID_TO->Show();
        $this->DatePicker_VALID_TO->Show();
        $this->UPDATE_BY->Show();
        $this->Button_Insert->Show();
        $this->Button_Update->Show();
        $this->Button_Delete->Show();
        $this->Button_Cancel->Show();
        $this->P_ONETIME_TARIFF_SCENARIO_ID->Show();
        $this->P_SERVICE_TYPE_ID->Show();
        $this->P_SERVICE_TYPE_NAME->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End P_ONETIME_TARIFF_SCENARIO1 Class @25-FCB6E20C

class clsP_ONETIME_TARIFF_SCENARIO1DataSource extends clsDBConn {  //P_ONETIME_TARIFF_SCENARIO1DataSource Class @25-A3F21C43

//DataSource Variables @25-CCCDD4C5
    var $Parent = "";
    var $CCSEvents = "";
    var $CCSEventResult;
    var $ErrorBlock;
    var $CmdExecution;

    var $InsertParameters;
    var $UpdateParameters;
    var $DeleteParameters;
    var $wp;
    var $AllParametersSet;


    // Datasource fields
    var $CODE;
    var $VALID_FROM;
    var $DESCRIPTION;
    var $UPDATE_DATE;
    var $VALID_TO;
    var $UPDATE_BY;
    var $P_ONETIME_TARIFF_SCENARIO_ID;
    var $P_SERVICE_TYPE_ID;
    var $P_SERVICE_TYPE_NAME;
//End DataSource Variables

//DataSourceClass_Initialize Event @25-77992F7D
    function clsP_ONETIME_TARIFF_SCENARIO1DataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record P_ONETIME_TARIFF_SCENARIO1/Error";
        $this->Initialize();
        $this->CODE = new clsField("CODE", ccsText, "");
        
        $this->VALID_FROM = new clsField("VALID_FROM", ccsText, "");
        
        $this->DESCRIPTION = new clsField("DESCRIPTION", ccsText, "");
        
        $this->UPDATE_DATE = new clsField("UPDATE_DATE", ccsDate, $this->DateFormat);
        
        $this->VALID_TO = new clsField("VALID_TO", ccsText, "");
        
        $this->UPDATE_BY = new clsField("UPDATE_BY", ccsText, "");
        
        $this->P_ONETIME_TARIFF_SCENARIO_ID = new clsField("P_ONETIME_TARIFF_SCENARIO_ID", ccsFloat, "");
        
        $this->P_SERVICE_TYPE_ID = new clsField("P_SERVICE_TYPE_ID", ccsFloat, "");
        
        $this->P_SERVICE_TYPE_NAME = new clsField("P_SERVICE_TYPE_NAME", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//Prepare Method @25-2F275786
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlP_ONETIME_TARIFF_SCENARIO_ID", ccsFloat, "", "", $this->Parameters["urlP_ONETIME_TARIFF_SCENARIO_ID"], "", false);
        $this->AllParametersSet = $this->wp->AllParamsSet();
    }
//End Prepare Method

//Open Method @25-398D2E93
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT \n" .
        "A.P_ONETIME_TARIFF_SCENARIO_ID,\n" .
        "A.CODE,\n" .
        "A.P_SERVICE_TYPE_ID,\n" .
        "TO_CHAR(A.VALID_FROM,'DD/MM/YYYY') AS VALID_FROM,\n" .
        "TO_CHAR(A.VALID_TO,'DD/MM/YYYY') AS VALID_TO, \n" .
        "A.DESCRIPTION, \n" .
        "A.UPDATE_DATE, \n" .
        "A.UPDATE_BY,\n" .
        "B.CODE AS P_SERVICE_TYPE_NAME\n" .
        "FROM P_ONETIME_TARIFF_SCENARIO A ,P_SERVICE_TYPE B \n" .
        "WHERE A.P_SERVICE_TYPE_ID=B.P_SERVICE_TYPE_ID\n" .
        "AND A.P_ONETIME_TARIFF_SCENARIO_ID=" . $this->SQLValue($this->wp->GetDBValue("1"), ccsFloat) . "";
        $this->Order = "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, $this->Order));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @25-CDAA2F55
    function SetValues()
    {
        $this->CODE->SetDBValue($this->f("CODE"));
        $this->VALID_FROM->SetDBValue($this->f("VALID_FROM"));
        $this->DESCRIPTION->SetDBValue($this->f("DESCRIPTION"));
        $this->UPDATE_DATE->SetDBValue(trim($this->f("UPDATE_DATE")));
        $this->VALID_TO->SetDBValue($this->f("VALID_TO"));
        $this->UPDATE_BY->SetDBValue($this->f("UPDATE_BY"));
        $this->P_ONETIME_TARIFF_SCENARIO_ID->SetDBValue(trim($this->f("P_ONETIME_TARIFF_SCENARIO_ID")));
        $this->P_SERVICE_TYPE_ID->SetDBValue(trim($this->f("P_SERVICE_TYPE_ID")));
        $this->P_SERVICE_TYPE_NAME->SetDBValue($this->f("P_SERVICE_TYPE_NAME"));
    }
//End SetValues Method

//Insert Method @25-11146566
    function Insert()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["CODE"] = new clsSQLParameter("ctrlCODE", ccsText, "", "", $this->CODE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["P_SERVICE_TYPE_ID"] = new clsSQLParameter("ctrlP_SERVICE_TYPE_ID", ccsFloat, "", "", $this->P_SERVICE_TYPE_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["VALID_FROM"] = new clsSQLParameter("ctrlVALID_FROM", ccsText, "", "", $this->VALID_FROM->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["VALID_TO"] = new clsSQLParameter("ctrlVALID_TO", ccsText, "", "", $this->VALID_TO->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["DESCRIPTION"] = new clsSQLParameter("ctrlDESCRIPTION", ccsText, "", "", $this->DESCRIPTION->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["UPDATE_BY"] = new clsSQLParameter("ctrlUPDATE_BY", ccsText, "", "", $this->UPDATE_BY->GetValue(true), "", false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildInsert", $this->Parent);
        if (!is_null($this->cp["CODE"]->GetValue()) and !strlen($this->cp["CODE"]->GetText()) and !is_bool($this->cp["CODE"]->GetValue())) 
            $this->cp["CODE"]->SetValue($this->CODE->GetValue(true));
        if (!is_null($this->cp["P_SERVICE_TYPE_ID"]->GetValue()) and !strlen($this->cp["P_SERVICE_TYPE_ID"]->GetText()) and !is_bool($this->cp["P_SERVICE_TYPE_ID"]->GetValue())) 
            $this->cp["P_SERVICE_TYPE_ID"]->SetValue($this->P_SERVICE_TYPE_ID->GetValue(true));
        if (!strlen($this->cp["P_SERVICE_TYPE_ID"]->GetText()) and !is_bool($this->cp["P_SERVICE_TYPE_ID"]->GetValue(true))) 
            $this->cp["P_SERVICE_TYPE_ID"]->SetText(0);
        if (!is_null($this->cp["VALID_FROM"]->GetValue()) and !strlen($this->cp["VALID_FROM"]->GetText()) and !is_bool($this->cp["VALID_FROM"]->GetValue())) 
            $this->cp["VALID_FROM"]->SetValue($this->VALID_FROM->GetValue(true));
        if (!is_null($this->cp["VALID_TO"]->GetValue()) and !strlen($this->cp["VALID_TO"]->GetText()) and !is_bool($this->cp["VALID_TO"]->GetValue())) 
            $this->cp["VALID_TO"]->SetValue($this->VALID_TO->GetValue(true));
        if (!is_null($this->cp["DESCRIPTION"]->GetValue()) and !strlen($this->cp["DESCRIPTION"]->GetText()) and !is_bool($this->cp["DESCRIPTION"]->GetValue())) 
            $this->cp["DESCRIPTION"]->SetValue($this->DESCRIPTION->GetValue(true));
        if (!is_null($this->cp["UPDATE_BY"]->GetValue()) and !strlen($this->cp["UPDATE_BY"]->GetText()) and !is_bool($this->cp["UPDATE_BY"]->GetValue())) 
            $this->cp["UPDATE_BY"]->SetValue($this->UPDATE_BY->GetValue(true));
        $this->SQL = "INSERT INTO P_ONETIME_TARIFF_SCENARIO\n" .
        "(P_ONETIME_TARIFF_SCENARIO_ID,CODE,P_SERVICE_TYPE_ID,VALID_FROM,VALID_TO,DESCRIPTION,UPDATE_DATE,UPDATE_BY)\n" .
        "VALUES\n" .
        "(GENERATE_ID('BILLDB','P_ONETIME_TARIFF_SCENARIO','P_ONETIME_TARIFF_SCENARIO_ID'),'" . $this->SQLValue($this->cp["CODE"]->GetDBValue(), ccsText) . "'," . $this->SQLValue($this->cp["P_SERVICE_TYPE_ID"]->GetDBValue(), ccsFloat) . ",TO_DATE('" . $this->SQLValue($this->cp["VALID_FROM"]->GetDBValue(), ccsText) . "','DD/MM/YYYY'),TO_DATE(NVL('" . $this->SQLValue($this->cp["VALID_TO"]->GetDBValue(), ccsText) . "',NULL),'DD/MM/YYYY'),'" . $this->SQLValue($this->cp["DESCRIPTION"]->GetDBValue(), ccsText) . "',SYSDATE,'" . $this->SQLValue($this->cp["UPDATE_BY"]->GetDBValue(), ccsText) . "')";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteInsert", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteInsert", $this->Parent);
        }
    }
//End Insert Method

//Update Method @25-7829BB7E
    function Update()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["CODE"] = new clsSQLParameter("ctrlCODE", ccsText, "", "", $this->CODE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["P_SERVICE_TYPE_ID"] = new clsSQLParameter("ctrlP_SERVICE_TYPE_ID", ccsFloat, "", "", $this->P_SERVICE_TYPE_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["VALID_FROM"] = new clsSQLParameter("ctrlVALID_FROM", ccsText, "", "", $this->VALID_FROM->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["VALID_TO"] = new clsSQLParameter("ctrlVALID_TO", ccsText, "", "", $this->VALID_TO->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["DESCRIPTION"] = new clsSQLParameter("ctrlDESCRIPTION", ccsText, "", "", $this->DESCRIPTION->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["UPDATE_BY"] = new clsSQLParameter("ctrlUPDATE_BY", ccsText, "", "", $this->UPDATE_BY->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["P_ONETIME_TARIFF_SCENARIO_ID"] = new clsSQLParameter("ctrlP_ONETIME_TARIFF_SCENARIO_ID", ccsFloat, "", "", $this->P_ONETIME_TARIFF_SCENARIO_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildUpdate", $this->Parent);
        if (!is_null($this->cp["CODE"]->GetValue()) and !strlen($this->cp["CODE"]->GetText()) and !is_bool($this->cp["CODE"]->GetValue())) 
            $this->cp["CODE"]->SetValue($this->CODE->GetValue(true));
        if (!is_null($this->cp["P_SERVICE_TYPE_ID"]->GetValue()) and !strlen($this->cp["P_SERVICE_TYPE_ID"]->GetText()) and !is_bool($this->cp["P_SERVICE_TYPE_ID"]->GetValue())) 
            $this->cp["P_SERVICE_TYPE_ID"]->SetValue($this->P_SERVICE_TYPE_ID->GetValue(true));
        if (!strlen($this->cp["P_SERVICE_TYPE_ID"]->GetText()) and !is_bool($this->cp["P_SERVICE_TYPE_ID"]->GetValue(true))) 
            $this->cp["P_SERVICE_TYPE_ID"]->SetText(0);
        if (!is_null($this->cp["VALID_FROM"]->GetValue()) and !strlen($this->cp["VALID_FROM"]->GetText()) and !is_bool($this->cp["VALID_FROM"]->GetValue())) 
            $this->cp["VALID_FROM"]->SetValue($this->VALID_FROM->GetValue(true));
        if (!is_null($this->cp["VALID_TO"]->GetValue()) and !strlen($this->cp["VALID_TO"]->GetText()) and !is_bool($this->cp["VALID_TO"]->GetValue())) 
            $this->cp["VALID_TO"]->SetValue($this->VALID_TO->GetValue(true));
        if (!is_null($this->cp["DESCRIPTION"]->GetValue()) and !strlen($this->cp["DESCRIPTION"]->GetText()) and !is_bool($this->cp["DESCRIPTION"]->GetValue())) 
            $this->cp["DESCRIPTION"]->SetValue($this->DESCRIPTION->GetValue(true));
        if (!is_null($this->cp["UPDATE_BY"]->GetValue()) and !strlen($this->cp["UPDATE_BY"]->GetText()) and !is_bool($this->cp["UPDATE_BY"]->GetValue())) 
            $this->cp["UPDATE_BY"]->SetValue($this->UPDATE_BY->GetValue(true));
        if (!is_null($this->cp["P_ONETIME_TARIFF_SCENARIO_ID"]->GetValue()) and !strlen($this->cp["P_ONETIME_TARIFF_SCENARIO_ID"]->GetText()) and !is_bool($this->cp["P_ONETIME_TARIFF_SCENARIO_ID"]->GetValue())) 
            $this->cp["P_ONETIME_TARIFF_SCENARIO_ID"]->SetValue($this->P_ONETIME_TARIFF_SCENARIO_ID->GetValue(true));
        if (!strlen($this->cp["P_ONETIME_TARIFF_SCENARIO_ID"]->GetText()) and !is_bool($this->cp["P_ONETIME_TARIFF_SCENARIO_ID"]->GetValue(true))) 
            $this->cp["P_ONETIME_TARIFF_SCENARIO_ID"]->SetText(0);
        $this->SQL = "UPDATE P_ONETIME_TARIFF_SCENARIO SET\n" .
        "CODE='" . $this->SQLValue($this->cp["CODE"]->GetDBValue(), ccsText) . "',\n" .
        "P_SERVICE_TYPE_ID=" . $this->SQLValue($this->cp["P_SERVICE_TYPE_ID"]->GetDBValue(), ccsFloat) . ",\n" .
        "VALID_FROM=TO_DATE('" . $this->SQLValue($this->cp["VALID_FROM"]->GetDBValue(), ccsText) . "','DD/MM/YYYY'),\n" .
        "VALID_TO=TO_DATE(NVL('" . $this->SQLValue($this->cp["VALID_TO"]->GetDBValue(), ccsText) . "',NULL),'DD/MM/YYYY'),\n" .
        "DESCRIPTION='" . $this->SQLValue($this->cp["DESCRIPTION"]->GetDBValue(), ccsText) . "',\n" .
        "UPDATE_DATE=SYSDATE,\n" .
        "UPDATE_BY='" . $this->SQLValue($this->cp["UPDATE_BY"]->GetDBValue(), ccsText) . "'\n" .
        "WHERE P_ONETIME_TARIFF_SCENARIO_ID=" . $this->SQLValue($this->cp["P_ONETIME_TARIFF_SCENARIO_ID"]->GetDBValue(), ccsFloat) . "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteUpdate", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteUpdate", $this->Parent);
        }
    }
//End Update Method

//Delete Method @25-A0C9E4B9
    function Delete()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["P_ONETIME_TARIFF_SCENARIO_ID"] = new clsSQLParameter("ctrlP_ONETIME_TARIFF_SCENARIO_ID", ccsFloat, "", "", $this->P_ONETIME_TARIFF_SCENARIO_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildDelete", $this->Parent);
        if (!is_null($this->cp["P_ONETIME_TARIFF_SCENARIO_ID"]->GetValue()) and !strlen($this->cp["P_ONETIME_TARIFF_SCENARIO_ID"]->GetText()) and !is_bool($this->cp["P_ONETIME_TARIFF_SCENARIO_ID"]->GetValue())) 
            $this->cp["P_ONETIME_TARIFF_SCENARIO_ID"]->SetValue($this->P_ONETIME_TARIFF_SCENARIO_ID->GetValue(true));
        if (!strlen($this->cp["P_ONETIME_TARIFF_SCENARIO_ID"]->GetText()) and !is_bool($this->cp["P_ONETIME_TARIFF_SCENARIO_ID"]->GetValue(true))) 
            $this->cp["P_ONETIME_TARIFF_SCENARIO_ID"]->SetText(0);
        $this->SQL = "DELETE P_ONETIME_TARIFF_SCENARIO WHERE P_ONETIME_TARIFF_SCENARIO_ID=" . $this->SQLValue($this->cp["P_ONETIME_TARIFF_SCENARIO_ID"]->GetDBValue(), ccsFloat) . "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteDelete", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteDelete", $this->Parent);
        }
    }
//End Delete Method

} //End P_ONETIME_TARIFF_SCENARIO1DataSource Class @25-FCB6E20C

//Initialize Page @1-5A1A9399
// Variables
$FileName = "";
$Redirect = "";
$Tpl = "";
$TemplateFileName = "";
$BlockToParse = "";
$ComponentName = "";
$Attributes = "";

// Events;
$CCSEvents = "";
$CCSEventResult = "";

$FileName = FileName;
$Redirect = "";
$TemplateFileName = "p_onetime_tariff_scenario.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "../";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Include events file @1-019F3AFF
include_once("./p_onetime_tariff_scenario_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-BD08B9DB
$DBConn = new clsDBConn();
$MainPage->Connections["Conn"] = & $DBConn;
$Attributes = new clsAttributes("page:");
$MainPage->Attributes = & $Attributes;

// Controls
$P_ONETIME_TARIFF_SCENARIO = & new clsGridP_ONETIME_TARIFF_SCENARIO("", $MainPage);
$P_ONETIME_TARIFF_SCENARIOSearch = & new clsRecordP_ONETIME_TARIFF_SCENARIOSearch("", $MainPage);
$P_ONETIME_TARIFF_SCENARIO1 = & new clsRecordP_ONETIME_TARIFF_SCENARIO1("", $MainPage);
$MainPage->P_ONETIME_TARIFF_SCENARIO = & $P_ONETIME_TARIFF_SCENARIO;
$MainPage->P_ONETIME_TARIFF_SCENARIOSearch = & $P_ONETIME_TARIFF_SCENARIOSearch;
$MainPage->P_ONETIME_TARIFF_SCENARIO1 = & $P_ONETIME_TARIFF_SCENARIO1;
$P_ONETIME_TARIFF_SCENARIO->Initialize();
$P_ONETIME_TARIFF_SCENARIO1->Initialize();

BindEvents();

$CCSEventResult = CCGetEvent($CCSEvents, "AfterInitialize", $MainPage);

if ($Charset) {
    header("Content-Type: " . $ContentType . "; charset=" . $Charset);
} else {
    header("Content-Type: " . $ContentType);
}
//End Initialize Objects

//Initialize HTML Template @1-52F9C312
$CCSEventResult = CCGetEvent($CCSEvents, "OnInitializeView", $MainPage);
$Tpl = new clsTemplate($FileEncoding, $TemplateEncoding);
$Tpl->LoadTemplate(PathToCurrentPage . $TemplateFileName, $BlockToParse, "CP1252");
$Tpl->block_path = "/$BlockToParse";
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeShow", $MainPage);
$Attributes->SetValue("pathToRoot", "../");
$Attributes->Show();
//End Initialize HTML Template

//Execute Components @1-7A8A83EB
$P_ONETIME_TARIFF_SCENARIOSearch->Operation();
$P_ONETIME_TARIFF_SCENARIO1->Operation();
//End Execute Components

//Go to destination page @1-C33E2B06
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBConn->close();
    header("Location: " . $Redirect);
    unset($P_ONETIME_TARIFF_SCENARIO);
    unset($P_ONETIME_TARIFF_SCENARIOSearch);
    unset($P_ONETIME_TARIFF_SCENARIO1);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-CAF798C5
$P_ONETIME_TARIFF_SCENARIO->Show();
$P_ONETIME_TARIFF_SCENARIOSearch->Show();
$P_ONETIME_TARIFF_SCENARIO1->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-A0584605
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBConn->close();
unset($P_ONETIME_TARIFF_SCENARIO);
unset($P_ONETIME_TARIFF_SCENARIOSearch);
unset($P_ONETIME_TARIFF_SCENARIO1);
unset($Tpl);
//End Unload Page


?>
