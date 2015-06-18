<?php
//Include Common Files @1-CDD69B46
define("RelativePath", "..");
define("PathToCurrentPage", "/param/");
define("FileName", "p_debtor_segment.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

class clsGridP_DEBTOR_SEGMENT { //P_DEBTOR_SEGMENT class @2-41E3D1C0

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

//Class_Initialize Event @2-31E8BD77
    function clsGridP_DEBTOR_SEGMENT($RelativePath, & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "P_DEBTOR_SEGMENT";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Grid P_DEBTOR_SEGMENT";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->DataSource = new clsP_DEBTOR_SEGMENTDataSource($this);
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
        $this->P_AR_SEGMENT_NAME = & new clsControl(ccsLabel, "P_AR_SEGMENT_NAME", "P_AR_SEGMENT_NAME", ccsText, "", CCGetRequestParam("P_AR_SEGMENT_NAME", ccsGet, NULL), $this);
        $this->OLD_CODE = & new clsControl(ccsLabel, "OLD_CODE", "OLD_CODE", ccsText, "", CCGetRequestParam("OLD_CODE", ccsGet, NULL), $this);
        $this->DESCRIPTION = & new clsControl(ccsLabel, "DESCRIPTION", "DESCRIPTION", ccsText, "", CCGetRequestParam("DESCRIPTION", ccsGet, NULL), $this);
        $this->DLink = & new clsControl(ccsLink, "DLink", "DLink", ccsText, "", CCGetRequestParam("DLink", ccsGet, NULL), $this);
        $this->DLink->HTML = true;
        $this->DLink->Page = "p_debtor_segment.php";
        $this->ADLink = & new clsControl(ccsLink, "ADLink", "ADLink", ccsText, "", CCGetRequestParam("ADLink", ccsGet, NULL), $this);
        $this->ADLink->HTML = true;
        $this->ADLink->Page = "p_debtor_segment.php";
        $this->P_DEBTOR_SEGMENT_ID = & new clsControl(ccsHidden, "P_DEBTOR_SEGMENT_ID", "P_DEBTOR_SEGMENT_ID", ccsFloat, "", CCGetRequestParam("P_DEBTOR_SEGMENT_ID", ccsGet, NULL), $this);
        $this->Navigator = & new clsNavigator($this->ComponentName, "Navigator", $FileName, 10, tpMoving, $this);
        $this->Navigator->PageSizes = array("1", "5", "10", "25", "50");
        $this->P_DEBTOR_SEGMENT_Insert = & new clsControl(ccsLink, "P_DEBTOR_SEGMENT_Insert", "P_DEBTOR_SEGMENT_Insert", ccsText, "", CCGetRequestParam("P_DEBTOR_SEGMENT_Insert", ccsGet, NULL), $this);
        $this->P_DEBTOR_SEGMENT_Insert->Page = "p_debtor_segment.php";
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

//Show Method @2-179ABE85
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
            $this->ControlsVisible["P_AR_SEGMENT_NAME"] = $this->P_AR_SEGMENT_NAME->Visible;
            $this->ControlsVisible["OLD_CODE"] = $this->OLD_CODE->Visible;
            $this->ControlsVisible["DESCRIPTION"] = $this->DESCRIPTION->Visible;
            $this->ControlsVisible["DLink"] = $this->DLink->Visible;
            $this->ControlsVisible["ADLink"] = $this->ADLink->Visible;
            $this->ControlsVisible["P_DEBTOR_SEGMENT_ID"] = $this->P_DEBTOR_SEGMENT_ID->Visible;
            while ($this->ForceIteration || (($this->RowNumber < $this->PageSize) &&  ($this->HasRecord = $this->DataSource->has_next_record()))) {
                $this->RowNumber++;
                if ($this->HasRecord) {
                    $this->DataSource->next_record();
                    $this->DataSource->SetValues();
                }
                $Tpl->block_path = $ParentPath . "/" . $GridBlock . "/Row";
                $this->CODE->SetValue($this->DataSource->CODE->GetValue());
                $this->P_AR_SEGMENT_NAME->SetValue($this->DataSource->P_AR_SEGMENT_NAME->GetValue());
                $this->OLD_CODE->SetValue($this->DataSource->OLD_CODE->GetValue());
                $this->DESCRIPTION->SetValue($this->DataSource->DESCRIPTION->GetValue());
                $this->DLink->SetValue($this->DataSource->DLink->GetValue());
                $this->DLink->Parameters = CCGetQueryString("QueryString", array("FLAG", "ccsForm"));
                $this->DLink->Parameters = CCAddParam($this->DLink->Parameters, "P_DEBTOR_SEGMENT_ID", $this->DataSource->f("P_DEBTOR_SEGMENT_ID"));
                $this->ADLink->SetValue($this->DataSource->ADLink->GetValue());
                $this->ADLink->Parameters = CCGetQueryString("QueryString", array("FLAG", "ccsForm"));
                $this->ADLink->Parameters = CCAddParam($this->ADLink->Parameters, "P_DEBTOR_SEGMENT_ID", $this->DataSource->f("P_DEBTOR_SEGMENT_ID"));
                $this->P_DEBTOR_SEGMENT_ID->SetValue($this->DataSource->P_DEBTOR_SEGMENT_ID->GetValue());
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->CODE->Show();
                $this->P_AR_SEGMENT_NAME->Show();
                $this->OLD_CODE->Show();
                $this->DESCRIPTION->Show();
                $this->DLink->Show();
                $this->ADLink->Show();
                $this->P_DEBTOR_SEGMENT_ID->Show();
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
        $this->P_DEBTOR_SEGMENT_Insert->Parameters = CCGetQueryString("QueryString", array("P_DEBTOR_SEGMENT_ID", "ccsForm"));
        $this->P_DEBTOR_SEGMENT_Insert->Parameters = CCAddParam($this->P_DEBTOR_SEGMENT_Insert->Parameters, "FLAG", "ADD");
        $this->Navigator->Show();
        $this->P_DEBTOR_SEGMENT_Insert->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

//GetErrors Method @2-28770F2D
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->CODE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->P_AR_SEGMENT_NAME->Errors->ToString());
        $errors = ComposeStrings($errors, $this->OLD_CODE->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DESCRIPTION->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DLink->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ADLink->Errors->ToString());
        $errors = ComposeStrings($errors, $this->P_DEBTOR_SEGMENT_ID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End P_DEBTOR_SEGMENT Class @2-FCB6E20C

class clsP_DEBTOR_SEGMENTDataSource extends clsDBConn {  //P_DEBTOR_SEGMENTDataSource Class @2-265EBF20

//DataSource Variables @2-3C60961A
    var $Parent = "";
    var $CCSEvents = "";
    var $CCSEventResult;
    var $ErrorBlock;
    var $CmdExecution;

    var $CountSQL;
    var $wp;


    // Datasource fields
    var $CODE;
    var $P_AR_SEGMENT_NAME;
    var $OLD_CODE;
    var $DESCRIPTION;
    var $DLink;
    var $ADLink;
    var $P_DEBTOR_SEGMENT_ID;
//End DataSource Variables

//DataSourceClass_Initialize Event @2-40D3FEC7
    function clsP_DEBTOR_SEGMENTDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid P_DEBTOR_SEGMENT";
        $this->Initialize();
        $this->CODE = new clsField("CODE", ccsText, "");
        
        $this->P_AR_SEGMENT_NAME = new clsField("P_AR_SEGMENT_NAME", ccsText, "");
        
        $this->OLD_CODE = new clsField("OLD_CODE", ccsText, "");
        
        $this->DESCRIPTION = new clsField("DESCRIPTION", ccsText, "");
        
        $this->DLink = new clsField("DLink", ccsText, "");
        
        $this->ADLink = new clsField("ADLink", ccsText, "");
        
        $this->P_DEBTOR_SEGMENT_ID = new clsField("P_DEBTOR_SEGMENT_ID", ccsFloat, "");
        

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

//Open Method @2-7A9E72A1
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*) FROM (select a.*,b.code as p_ar_segment_name from p_debtor_segment a , p_ar_segment b\n" .
        "where a.p_ar_segment_id=b.p_ar_segment_id\n" .
        "and upper(a.code) like upper('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%')) cnt";
        $this->SQL = "select a.*,b.code as p_ar_segment_name from p_debtor_segment a , p_ar_segment b\n" .
        "where a.p_ar_segment_id=b.p_ar_segment_id\n" .
        "and upper(a.code) like upper('%" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "%')";
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

//SetValues Method @2-8B2AD2F6
    function SetValues()
    {
        $this->CODE->SetDBValue($this->f("CODE"));
        $this->P_AR_SEGMENT_NAME->SetDBValue($this->f("P_AR_SEGMENT_NAME"));
        $this->OLD_CODE->SetDBValue($this->f("OLD_CODE"));
        $this->DESCRIPTION->SetDBValue($this->f("DESCRIPTION"));
        $this->DLink->SetDBValue($this->f("P_DEBTOR_SEGMENT_ID"));
        $this->ADLink->SetDBValue($this->f("P_DEBTOR_SEGMENT_ID"));
        $this->P_DEBTOR_SEGMENT_ID->SetDBValue(trim($this->f("P_DEBTOR_SEGMENT_ID")));
    }
//End SetValues Method

} //End P_DEBTOR_SEGMENTDataSource Class @2-FCB6E20C

class clsRecordP_DEBTOR_SEGMENTSearch { //P_DEBTOR_SEGMENTSearch Class @3-14B37C19

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

//Class_Initialize Event @3-E60897C3
    function clsRecordP_DEBTOR_SEGMENTSearch($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record P_DEBTOR_SEGMENTSearch/Error";
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "P_DEBTOR_SEGMENTSearch";
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

//Operation Method @3-CD177FEE
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
        $Redirect = "p_debtor_segment.php";
        if($this->Validate()) {
            if($this->PressedButton == "Button_DoSearch") {
                $Redirect = "p_debtor_segment.php" . "?" . CCMergeQueryStrings(CCGetQueryString("Form", array("Button_DoSearch", "Button_DoSearch_x", "Button_DoSearch_y")));
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

} //End P_DEBTOR_SEGMENTSearch Class @3-FCB6E20C

class clsRecordp_debtor_segment1 { //p_debtor_segment1 Class @25-E6611EBA

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

//Class_Initialize Event @25-54F45F9E
    function clsRecordp_debtor_segment1($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record p_debtor_segment1/Error";
        $this->DataSource = new clsp_debtor_segment1DataSource($this);
        $this->ds = & $this->DataSource;
        $this->InsertAllowed = true;
        $this->UpdateAllowed = true;
        $this->DeleteAllowed = true;
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "p_debtor_segment1";
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
            $this->P_AR_SEGMENT_ID = & new clsControl(ccsHidden, "P_AR_SEGMENT_ID", "P AR SEGMENT ID", ccsFloat, "", CCGetRequestParam("P_AR_SEGMENT_ID", $Method, NULL), $this);
            $this->P_AR_SEGMENT_ID->Required = true;
            $this->OLD_CODE = & new clsControl(ccsTextBox, "OLD_CODE", "OLD CODE", ccsText, "", CCGetRequestParam("OLD_CODE", $Method, NULL), $this);
            $this->DESCRIPTION = & new clsControl(ccsTextArea, "DESCRIPTION", "DESCRIPTION", ccsText, "", CCGetRequestParam("DESCRIPTION", $Method, NULL), $this);
            $this->UPDATE_BY = & new clsControl(ccsTextBox, "UPDATE_BY", "UPDATE BY", ccsText, "", CCGetRequestParam("UPDATE_BY", $Method, NULL), $this);
            $this->UPDATE_BY->Required = true;
            $this->UPDATE_DATE = & new clsControl(ccsTextBox, "UPDATE_DATE", "UPDATE DATE", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("UPDATE_DATE", $Method, NULL), $this);
            $this->UPDATE_DATE->Required = true;
            $this->Button_Insert1 = & new clsButton("Button_Insert1", $Method, $this);
            $this->Button_Update1 = & new clsButton("Button_Update1", $Method, $this);
            $this->Button_Delete1 = & new clsButton("Button_Delete1", $Method, $this);
            $this->Button_Cancel1 = & new clsButton("Button_Cancel1", $Method, $this);
            $this->P_AR_SEGMENT_NAME = & new clsControl(ccsTextBox, "P_AR_SEGMENT_NAME", "P AR SEGMENT ID", ccsText, "", CCGetRequestParam("P_AR_SEGMENT_NAME", $Method, NULL), $this);
            $this->P_DEBTOR_SEGMENT_ID = & new clsControl(ccsHidden, "P_DEBTOR_SEGMENT_ID", "CODE", ccsText, "", CCGetRequestParam("P_DEBTOR_SEGMENT_ID", $Method, NULL), $this);
            if(!$this->FormSubmitted) {
                if(!is_array($this->UPDATE_BY->Value) && !strlen($this->UPDATE_BY->Value) && $this->UPDATE_BY->Value !== false)
                    $this->UPDATE_BY->SetText(CCGetUserLogin());
                if(!is_array($this->UPDATE_DATE->Value) && !strlen($this->UPDATE_DATE->Value) && $this->UPDATE_DATE->Value !== false)
                    $this->UPDATE_DATE->SetText(date("d-M-Y"));
            }
        }
    }
//End Class_Initialize Event

//Initialize Method @25-24185465
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["urlP_DEBTOR_SEGMENT_ID"] = CCGetFromGet("P_DEBTOR_SEGMENT_ID", NULL);
    }
//End Initialize Method

//Validate Method @25-4637E758
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->CODE->Validate() && $Validation);
        $Validation = ($this->P_AR_SEGMENT_ID->Validate() && $Validation);
        $Validation = ($this->OLD_CODE->Validate() && $Validation);
        $Validation = ($this->DESCRIPTION->Validate() && $Validation);
        $Validation = ($this->UPDATE_BY->Validate() && $Validation);
        $Validation = ($this->UPDATE_DATE->Validate() && $Validation);
        $Validation = ($this->P_AR_SEGMENT_NAME->Validate() && $Validation);
        $Validation = ($this->P_DEBTOR_SEGMENT_ID->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->CODE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_AR_SEGMENT_ID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->OLD_CODE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->DESCRIPTION->Errors->Count() == 0);
        $Validation =  $Validation && ($this->UPDATE_BY->Errors->Count() == 0);
        $Validation =  $Validation && ($this->UPDATE_DATE->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_AR_SEGMENT_NAME->Errors->Count() == 0);
        $Validation =  $Validation && ($this->P_DEBTOR_SEGMENT_ID->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @25-A3BED86D
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->CODE->Errors->Count());
        $errors = ($errors || $this->P_AR_SEGMENT_ID->Errors->Count());
        $errors = ($errors || $this->OLD_CODE->Errors->Count());
        $errors = ($errors || $this->DESCRIPTION->Errors->Count());
        $errors = ($errors || $this->UPDATE_BY->Errors->Count());
        $errors = ($errors || $this->UPDATE_DATE->Errors->Count());
        $errors = ($errors || $this->P_AR_SEGMENT_NAME->Errors->Count());
        $errors = ($errors || $this->P_DEBTOR_SEGMENT_ID->Errors->Count());
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

//Operation Method @25-9EABF5E0
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
            $this->PressedButton = $this->EditMode ? "Button_Update1" : "Button_Insert1";
            if($this->Button_Insert1->Pressed) {
                $this->PressedButton = "Button_Insert1";
            } else if($this->Button_Update1->Pressed) {
                $this->PressedButton = "Button_Update1";
            } else if($this->Button_Delete1->Pressed) {
                $this->PressedButton = "Button_Delete1";
            } else if($this->Button_Cancel1->Pressed) {
                $this->PressedButton = "Button_Cancel1";
            }
        }
        $Redirect = $FileName . "?" . CCGetQueryString("QueryString", array("ccsForm"));
        if($this->PressedButton == "Button_Delete1") {
            $Redirect = $FileName . "?" . CCGetQueryString("QueryString", array("ccsForm", "TAMBAH", "s_keyword"));
            if(!CCGetEvent($this->Button_Delete1->CCSEvents, "OnClick", $this->Button_Delete1) || !$this->DeleteRow()) {
                $Redirect = "";
            }
        } else if($this->PressedButton == "Button_Cancel1") {
            $Redirect = $FileName . "?" . CCGetQueryString("QueryString", array("ccsForm", "TAMBAH", "s_keyword", "P_AR_SEGMENTPage"));
            if(!CCGetEvent($this->Button_Cancel1->CCSEvents, "OnClick", $this->Button_Cancel1)) {
                $Redirect = "";
            }
        } else if($this->Validate()) {
            if($this->PressedButton == "Button_Insert1") {
                $Redirect = $FileName . "?" . CCGetQueryString("QueryString", array("ccsForm", "TAMBAH", "s_keyword"));
                if(!CCGetEvent($this->Button_Insert1->CCSEvents, "OnClick", $this->Button_Insert1) || !$this->InsertRow()) {
                    $Redirect = "";
                }
            } else if($this->PressedButton == "Button_Update1") {
                $Redirect = $FileName . "?" . CCGetQueryString("QueryString", array("ccsForm", "FLAG"));
                if(!CCGetEvent($this->Button_Update1->CCSEvents, "OnClick", $this->Button_Update1) || !$this->UpdateRow()) {
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

//InsertRow Method @25-5D493067
    function InsertRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeInsert", $this);
        if(!$this->InsertAllowed) return false;
        $this->DataSource->CODE->SetValue($this->CODE->GetValue(true));
        $this->DataSource->OLD_CODE->SetValue($this->OLD_CODE->GetValue(true));
        $this->DataSource->DESCRIPTION->SetValue($this->DESCRIPTION->GetValue(true));
        $this->DataSource->UPDATE_BY->SetValue($this->UPDATE_BY->GetValue(true));
        $this->DataSource->P_AR_SEGMENT_ID->SetValue($this->P_AR_SEGMENT_ID->GetValue(true));
        $this->DataSource->Insert();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterInsert", $this);
        return (!$this->CheckErrors());
    }
//End InsertRow Method

//UpdateRow Method @25-BA624989
    function UpdateRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeUpdate", $this);
        if(!$this->UpdateAllowed) return false;
        $this->DataSource->CODE->SetValue($this->CODE->GetValue(true));
        $this->DataSource->OLD_CODE->SetValue($this->OLD_CODE->GetValue(true));
        $this->DataSource->P_DEBTOR_SEGMENT_ID->SetValue($this->P_DEBTOR_SEGMENT_ID->GetValue(true));
        $this->DataSource->UPDATE_BY->SetValue($this->UPDATE_BY->GetValue(true));
        $this->DataSource->DESCRIPTION->SetValue($this->DESCRIPTION->GetValue(true));
        $this->DataSource->P_AR_SEGMENT_ID->SetValue($this->P_AR_SEGMENT_ID->GetValue(true));
        $this->DataSource->Update();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterUpdate", $this);
        return (!$this->CheckErrors());
    }
//End UpdateRow Method

//DeleteRow Method @25-B0C9823C
    function DeleteRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeDelete", $this);
        if(!$this->DeleteAllowed) return false;
        $this->DataSource->P_DEBTOR_SEGMENT_ID->SetValue($this->P_DEBTOR_SEGMENT_ID->GetValue(true));
        $this->DataSource->Delete();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterDelete", $this);
        return (!$this->CheckErrors());
    }
//End DeleteRow Method

//Show Method @25-08B98963
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
                    $this->P_AR_SEGMENT_ID->SetValue($this->DataSource->P_AR_SEGMENT_ID->GetValue());
                    $this->OLD_CODE->SetValue($this->DataSource->OLD_CODE->GetValue());
                    $this->DESCRIPTION->SetValue($this->DataSource->DESCRIPTION->GetValue());
                    $this->UPDATE_BY->SetValue($this->DataSource->UPDATE_BY->GetValue());
                    $this->UPDATE_DATE->SetValue($this->DataSource->UPDATE_DATE->GetValue());
                    $this->P_AR_SEGMENT_NAME->SetValue($this->DataSource->P_AR_SEGMENT_NAME->GetValue());
                    $this->P_DEBTOR_SEGMENT_ID->SetValue($this->DataSource->P_DEBTOR_SEGMENT_ID->GetValue());
                }
            } else {
                $this->EditMode = false;
            }
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->CODE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_AR_SEGMENT_ID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->OLD_CODE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DESCRIPTION->Errors->ToString());
            $Error = ComposeStrings($Error, $this->UPDATE_BY->Errors->ToString());
            $Error = ComposeStrings($Error, $this->UPDATE_DATE->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_AR_SEGMENT_NAME->Errors->ToString());
            $Error = ComposeStrings($Error, $this->P_DEBTOR_SEGMENT_ID->Errors->ToString());
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
        $this->Button_Insert1->Visible = !$this->EditMode && $this->InsertAllowed;
        $this->Button_Update1->Visible = $this->EditMode && $this->UpdateAllowed;
        $this->Button_Delete1->Visible = $this->EditMode && $this->DeleteAllowed;

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShow", $this);
        $this->Attributes->Show();
        if(!$this->Visible) {
            $Tpl->block_path = $ParentPath;
            return;
        }

        $this->CODE->Show();
        $this->P_AR_SEGMENT_ID->Show();
        $this->OLD_CODE->Show();
        $this->DESCRIPTION->Show();
        $this->UPDATE_BY->Show();
        $this->UPDATE_DATE->Show();
        $this->Button_Insert1->Show();
        $this->Button_Update1->Show();
        $this->Button_Delete1->Show();
        $this->Button_Cancel1->Show();
        $this->P_AR_SEGMENT_NAME->Show();
        $this->P_DEBTOR_SEGMENT_ID->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End p_debtor_segment1 Class @25-FCB6E20C

class clsp_debtor_segment1DataSource extends clsDBConn {  //p_debtor_segment1DataSource Class @25-3CA69510

//DataSource Variables @25-9F2512FE
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
    var $P_AR_SEGMENT_ID;
    var $OLD_CODE;
    var $DESCRIPTION;
    var $UPDATE_BY;
    var $UPDATE_DATE;
    var $P_AR_SEGMENT_NAME;
    var $P_DEBTOR_SEGMENT_ID;
//End DataSource Variables

//DataSourceClass_Initialize Event @25-E49DEF63
    function clsp_debtor_segment1DataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record p_debtor_segment1/Error";
        $this->Initialize();
        $this->CODE = new clsField("CODE", ccsText, "");
        
        $this->P_AR_SEGMENT_ID = new clsField("P_AR_SEGMENT_ID", ccsFloat, "");
        
        $this->OLD_CODE = new clsField("OLD_CODE", ccsText, "");
        
        $this->DESCRIPTION = new clsField("DESCRIPTION", ccsText, "");
        
        $this->UPDATE_BY = new clsField("UPDATE_BY", ccsText, "");
        
        $this->UPDATE_DATE = new clsField("UPDATE_DATE", ccsDate, $this->DateFormat);
        
        $this->P_AR_SEGMENT_NAME = new clsField("P_AR_SEGMENT_NAME", ccsText, "");
        
        $this->P_DEBTOR_SEGMENT_ID = new clsField("P_DEBTOR_SEGMENT_ID", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//Prepare Method @25-FA821902
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlP_DEBTOR_SEGMENT_ID", ccsFloat, "", "", $this->Parameters["urlP_DEBTOR_SEGMENT_ID"], "", false);
        $this->AllParametersSet = $this->wp->AllParamsSet();
    }
//End Prepare Method

//Open Method @25-8F9F30AD
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "select a.*,b.code as p_ar_segment_name from p_debtor_segment a , p_ar_segment b\n" .
        "where a.p_ar_segment_id=b.p_ar_segment_id\n" .
        "and a.P_DEBTOR_SEGMENT_ID=" . $this->SQLValue($this->wp->GetDBValue("1"), ccsFloat) . "";
        $this->Order = "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, $this->Order));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @25-6EBC770C
    function SetValues()
    {
        $this->CODE->SetDBValue($this->f("CODE"));
        $this->P_AR_SEGMENT_ID->SetDBValue(trim($this->f("P_AR_SEGMENT_ID")));
        $this->OLD_CODE->SetDBValue($this->f("OLD_CODE"));
        $this->DESCRIPTION->SetDBValue($this->f("DESCRIPTION"));
        $this->UPDATE_BY->SetDBValue($this->f("UPDATE_BY"));
        $this->UPDATE_DATE->SetDBValue(trim($this->f("UPDATE_DATE")));
        $this->P_AR_SEGMENT_NAME->SetDBValue($this->f("P_AR_SEGMENT_NAME"));
        $this->P_DEBTOR_SEGMENT_ID->SetDBValue($this->f("P_DEBTOR_SEGMENT_ID"));
    }
//End SetValues Method

//Insert Method @25-6A501262
    function Insert()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["CODE"] = new clsSQLParameter("ctrlCODE", ccsText, "", "", $this->CODE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["OLD_CODE"] = new clsSQLParameter("ctrlOLD_CODE", ccsText, "", "", $this->OLD_CODE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["DESCRIPTION"] = new clsSQLParameter("ctrlDESCRIPTION", ccsText, "", "", $this->DESCRIPTION->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["UPDATE_BY"] = new clsSQLParameter("ctrlUPDATE_BY", ccsText, "", "", $this->UPDATE_BY->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["P_AR_SEGMENT_ID"] = new clsSQLParameter("ctrlP_AR_SEGMENT_ID", ccsFloat, "", "", $this->P_AR_SEGMENT_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildInsert", $this->Parent);
        if (!is_null($this->cp["CODE"]->GetValue()) and !strlen($this->cp["CODE"]->GetText()) and !is_bool($this->cp["CODE"]->GetValue())) 
            $this->cp["CODE"]->SetValue($this->CODE->GetValue(true));
        if (!is_null($this->cp["OLD_CODE"]->GetValue()) and !strlen($this->cp["OLD_CODE"]->GetText()) and !is_bool($this->cp["OLD_CODE"]->GetValue())) 
            $this->cp["OLD_CODE"]->SetValue($this->OLD_CODE->GetValue(true));
        if (!is_null($this->cp["DESCRIPTION"]->GetValue()) and !strlen($this->cp["DESCRIPTION"]->GetText()) and !is_bool($this->cp["DESCRIPTION"]->GetValue())) 
            $this->cp["DESCRIPTION"]->SetValue($this->DESCRIPTION->GetValue(true));
        if (!is_null($this->cp["UPDATE_BY"]->GetValue()) and !strlen($this->cp["UPDATE_BY"]->GetText()) and !is_bool($this->cp["UPDATE_BY"]->GetValue())) 
            $this->cp["UPDATE_BY"]->SetValue($this->UPDATE_BY->GetValue(true));
        if (!is_null($this->cp["P_AR_SEGMENT_ID"]->GetValue()) and !strlen($this->cp["P_AR_SEGMENT_ID"]->GetText()) and !is_bool($this->cp["P_AR_SEGMENT_ID"]->GetValue())) 
            $this->cp["P_AR_SEGMENT_ID"]->SetValue($this->P_AR_SEGMENT_ID->GetValue(true));
        if (!strlen($this->cp["P_AR_SEGMENT_ID"]->GetText()) and !is_bool($this->cp["P_AR_SEGMENT_ID"]->GetValue(true))) 
            $this->cp["P_AR_SEGMENT_ID"]->SetText(0);
        $this->SQL = "INSERT INTO P_DEBTOR_SEGMENT(P_DEBTOR_SEGMENT_ID, CODE, P_AR_SEGMENT_ID, OLD_CODE, DESCRIPTION, UPDATE_DATE, UPDATE_BY)\n" .
        "VALUES\n" .
        "(GENERATE_ID('TRB','P_DEBTOR_SEGMENT','P_DEBTOR_SEGMENT_ID'),UPPER(TRIM('" . $this->SQLValue($this->cp["CODE"]->GetDBValue(), ccsText) . "'))," . $this->SQLValue($this->cp["P_AR_SEGMENT_ID"]->GetDBValue(), ccsFloat) . ",UPPER(TRIM('" . $this->SQLValue($this->cp["OLD_CODE"]->GetDBValue(), ccsText) . "')),'" . $this->SQLValue($this->cp["DESCRIPTION"]->GetDBValue(), ccsText) . "',sysdate, '" . $this->SQLValue($this->cp["UPDATE_BY"]->GetDBValue(), ccsText) . "')";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteInsert", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteInsert", $this->Parent);
        }
    }
//End Insert Method

//Update Method @25-3B47E684
    function Update()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["CODE"] = new clsSQLParameter("ctrlCODE", ccsText, "", "", $this->CODE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["OLD_CODE"] = new clsSQLParameter("ctrlOLD_CODE", ccsText, "", "", $this->OLD_CODE->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["P_DEBTOR_SEGMENT_ID"] = new clsSQLParameter("ctrlP_DEBTOR_SEGMENT_ID", ccsFloat, "", "", $this->P_DEBTOR_SEGMENT_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["UPDATE_BY"] = new clsSQLParameter("ctrlUPDATE_BY", ccsText, "", "", $this->UPDATE_BY->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["DESCRIPTION"] = new clsSQLParameter("ctrlDESCRIPTION", ccsText, "", "", $this->DESCRIPTION->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["P_AR_SEGMENT_ID"] = new clsSQLParameter("ctrlP_AR_SEGMENT_ID", ccsFloat, "", "", $this->P_AR_SEGMENT_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildUpdate", $this->Parent);
        if (!is_null($this->cp["CODE"]->GetValue()) and !strlen($this->cp["CODE"]->GetText()) and !is_bool($this->cp["CODE"]->GetValue())) 
            $this->cp["CODE"]->SetValue($this->CODE->GetValue(true));
        if (!is_null($this->cp["OLD_CODE"]->GetValue()) and !strlen($this->cp["OLD_CODE"]->GetText()) and !is_bool($this->cp["OLD_CODE"]->GetValue())) 
            $this->cp["OLD_CODE"]->SetValue($this->OLD_CODE->GetValue(true));
        if (!is_null($this->cp["P_DEBTOR_SEGMENT_ID"]->GetValue()) and !strlen($this->cp["P_DEBTOR_SEGMENT_ID"]->GetText()) and !is_bool($this->cp["P_DEBTOR_SEGMENT_ID"]->GetValue())) 
            $this->cp["P_DEBTOR_SEGMENT_ID"]->SetValue($this->P_DEBTOR_SEGMENT_ID->GetValue(true));
        if (!strlen($this->cp["P_DEBTOR_SEGMENT_ID"]->GetText()) and !is_bool($this->cp["P_DEBTOR_SEGMENT_ID"]->GetValue(true))) 
            $this->cp["P_DEBTOR_SEGMENT_ID"]->SetText(0);
        if (!is_null($this->cp["UPDATE_BY"]->GetValue()) and !strlen($this->cp["UPDATE_BY"]->GetText()) and !is_bool($this->cp["UPDATE_BY"]->GetValue())) 
            $this->cp["UPDATE_BY"]->SetValue($this->UPDATE_BY->GetValue(true));
        if (!is_null($this->cp["DESCRIPTION"]->GetValue()) and !strlen($this->cp["DESCRIPTION"]->GetText()) and !is_bool($this->cp["DESCRIPTION"]->GetValue())) 
            $this->cp["DESCRIPTION"]->SetValue($this->DESCRIPTION->GetValue(true));
        if (!is_null($this->cp["P_AR_SEGMENT_ID"]->GetValue()) and !strlen($this->cp["P_AR_SEGMENT_ID"]->GetText()) and !is_bool($this->cp["P_AR_SEGMENT_ID"]->GetValue())) 
            $this->cp["P_AR_SEGMENT_ID"]->SetValue($this->P_AR_SEGMENT_ID->GetValue(true));
        if (!strlen($this->cp["P_AR_SEGMENT_ID"]->GetText()) and !is_bool($this->cp["P_AR_SEGMENT_ID"]->GetValue(true))) 
            $this->cp["P_AR_SEGMENT_ID"]->SetText(0);
        $this->SQL = "UPDATE P_DEBTOR_SEGMENT SET \n" .
        "CODE='" . $this->SQLValue($this->cp["CODE"]->GetDBValue(), ccsText) . "',\n" .
        "OLD_CODE='" . $this->SQLValue($this->cp["OLD_CODE"]->GetDBValue(), ccsText) . "',\n" .
        "P_AR_SEGMENT_ID=" . $this->SQLValue($this->cp["P_AR_SEGMENT_ID"]->GetDBValue(), ccsFloat) . ",\n" .
        "DESCRIPTION=INITCAP(TRIM('" . $this->SQLValue($this->cp["DESCRIPTION"]->GetDBValue(), ccsText) . "')),\n" .
        "UPDATE_DATE=sysdate,\n" .
        "UPDATE_BY='" . $this->SQLValue($this->cp["UPDATE_BY"]->GetDBValue(), ccsText) . "'\n" .
        "WHERE  P_DEBTOR_SEGMENT_ID = " . $this->SQLValue($this->cp["P_DEBTOR_SEGMENT_ID"]->GetDBValue(), ccsFloat) . "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteUpdate", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteUpdate", $this->Parent);
        }
    }
//End Update Method

//Delete Method @25-8CA2435E
    function Delete()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["P_DEBTOR_SEGMENT_ID"] = new clsSQLParameter("ctrlP_DEBTOR_SEGMENT_ID", ccsFloat, "", "", $this->P_DEBTOR_SEGMENT_ID->GetValue(true), 0, false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildDelete", $this->Parent);
        if (!is_null($this->cp["P_DEBTOR_SEGMENT_ID"]->GetValue()) and !strlen($this->cp["P_DEBTOR_SEGMENT_ID"]->GetText()) and !is_bool($this->cp["P_DEBTOR_SEGMENT_ID"]->GetValue())) 
            $this->cp["P_DEBTOR_SEGMENT_ID"]->SetValue($this->P_DEBTOR_SEGMENT_ID->GetValue(true));
        if (!strlen($this->cp["P_DEBTOR_SEGMENT_ID"]->GetText()) and !is_bool($this->cp["P_DEBTOR_SEGMENT_ID"]->GetValue(true))) 
            $this->cp["P_DEBTOR_SEGMENT_ID"]->SetText(0);
        $this->SQL = "DELETE FROM P_DEBTOR_SEGMENT WHERE P_DEBTOR_SEGMENT_ID = " . $this->SQLValue($this->cp["P_DEBTOR_SEGMENT_ID"]->GetDBValue(), ccsFloat) . "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteDelete", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteDelete", $this->Parent);
        }
    }
//End Delete Method

} //End p_debtor_segment1DataSource Class @25-FCB6E20C

//Initialize Page @1-805D7360
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
$TemplateFileName = "p_debtor_segment.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "../";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Include events file @1-29E58756
include_once("./p_debtor_segment_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-8C0216F1
$DBConn = new clsDBConn();
$MainPage->Connections["Conn"] = & $DBConn;
$Attributes = new clsAttributes("page:");
$MainPage->Attributes = & $Attributes;

// Controls
$P_DEBTOR_SEGMENT = & new clsGridP_DEBTOR_SEGMENT("", $MainPage);
$P_DEBTOR_SEGMENTSearch = & new clsRecordP_DEBTOR_SEGMENTSearch("", $MainPage);
$p_debtor_segment1 = & new clsRecordp_debtor_segment1("", $MainPage);
$MainPage->P_DEBTOR_SEGMENT = & $P_DEBTOR_SEGMENT;
$MainPage->P_DEBTOR_SEGMENTSearch = & $P_DEBTOR_SEGMENTSearch;
$MainPage->p_debtor_segment1 = & $p_debtor_segment1;
$P_DEBTOR_SEGMENT->Initialize();
$p_debtor_segment1->Initialize();

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

//Execute Components @1-2E49F3D2
$P_DEBTOR_SEGMENTSearch->Operation();
$p_debtor_segment1->Operation();
//End Execute Components

//Go to destination page @1-084444E8
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBConn->close();
    header("Location: " . $Redirect);
    unset($P_DEBTOR_SEGMENT);
    unset($P_DEBTOR_SEGMENTSearch);
    unset($p_debtor_segment1);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-986BF3AF
$P_DEBTOR_SEGMENT->Show();
$P_DEBTOR_SEGMENTSearch->Show();
$p_debtor_segment1->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-1720F3B2
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBConn->close();
unset($P_DEBTOR_SEGMENT);
unset($P_DEBTOR_SEGMENTSearch);
unset($p_debtor_segment1);
unset($Tpl);
//End Unload Page


?>
