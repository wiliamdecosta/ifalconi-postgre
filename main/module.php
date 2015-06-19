<?php
//Include Common Files @1-F8222C7D
define("RelativePath", "..");
define("PathToCurrentPage", "/main/");
define("FileName", "module.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

class clsGridModulGrid { //ModulGrid class @2-E05CEE1C

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

//Class_Initialize Event @2-CF796428
    function clsGridModulGrid($RelativePath, & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "ModulGrid";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Grid ModulGrid";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->DataSource = new clsModulGridDataSource($this);
        $this->ds = & $this->DataSource;
        $this->PageSize = CCGetParam($this->ComponentName . "PageSize", "");
        if(!is_numeric($this->PageSize) || !strlen($this->PageSize))
            $this->PageSize = 25;
        else
            $this->PageSize = intval($this->PageSize);
        if ($this->PageSize > 100)
            $this->PageSize = 100;
        if($this->PageSize == 0)
            $this->Errors->addError("<p>Form: Grid " . $this->ComponentName . "<br>Error: (CCS06) Invalid page size.</p>");
        $this->PageNumber = intval(CCGetParam($this->ComponentName . "Page", 1));
        if ($this->PageNumber <= 0) $this->PageNumber = 1;

        $this->RowOpenTag = & new clsPanel("RowOpenTag", $this);
        $this->RowComponents = & new clsPanel("RowComponents", $this);
        $this->module_image = & new clsControl(ccsImageLink, "module_image", "module_image", ccsMemo, "", CCGetRequestParam("module_image", ccsGet, NULL), $this);
        $this->module_image->Page = "f_modul.php";
        $this->code = & new clsControl(ccsLabel, "code", "code", ccsText, "", CCGetRequestParam("code", ccsGet, NULL), $this);
        $this->code_off = & new clsControl(ccsLabel, "code_off", "code_off", ccsText, "", CCGetRequestParam("code_off", ccsGet, NULL), $this);
        $this->RowCloseTag = & new clsPanel("RowCloseTag", $this);
        $this->RowComponents->AddComponent("module_image", $this->module_image);
        $this->RowComponents->AddComponent("code", $this->code);
        $this->RowComponents->AddComponent("code_off", $this->code_off);
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

//Show Method @2-4E233F0F
    function Show()
    {
        global $Tpl;
        global $CCSLocales;
        if(!$this->Visible) return;

        $this->RowNumber = 0;


        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeSelect", $this);


        $this->DataSource->Prepare();
        $this->DataSource->Open();
        $this->HasRecord = $this->DataSource->has_next_record();
        $this->IsEmpty = ! $this->HasRecord;
        $this->Attributes->SetValue("numberOfColumns", 4);
        $this->Attributes->Show();

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShow", $this);
        if(!$this->Visible) return;

        $GridBlock = "Grid " . $this->ComponentName;
        $ParentPath = $Tpl->block_path;
        $Tpl->block_path = $ParentPath . "/" . $GridBlock;


        if (!$this->IsEmpty) {
            $this->ControlsVisible["RowOpenTag"] = $this->RowOpenTag->Visible;
            $this->ControlsVisible["RowComponents"] = $this->RowComponents->Visible;
            $this->ControlsVisible["module_image"] = $this->module_image->Visible;
            $this->ControlsVisible["code"] = $this->code->Visible;
            $this->ControlsVisible["code_off"] = $this->code_off->Visible;
            $this->ControlsVisible["RowCloseTag"] = $this->RowCloseTag->Visible;
            while ($this->ForceIteration || (($this->RowNumber < $this->PageSize) &&  ($this->HasRecord = $this->DataSource->has_next_record()))) {
                $this->RowNumber++;
                if ($this->HasRecord) {
                    $this->DataSource->next_record();
                    $this->DataSource->SetValues();
                }
                $Tpl->block_path = $ParentPath . "/" . $GridBlock . "/Row";
                $this->module_image->SetValue($this->DataSource->module_image->GetValue());
                $this->module_image->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
                if ($this->DataSource->f("is_on")==0) {
                   $this->module_image->Page = "#";
                   $this->code_off->Visible=true;
                   $this->code->Visible=false;
                } else { 
				   $this->module_image->Page = "f_modul.php";
                   $this->module_image->Parameters = CCAddParam($this->module_image->Parameters, "p_application_id", $this->DataSource->f("p_application_id"));
                   $this->module_image->Parameters = CCAddParam($this->module_image->Parameters, "p_application_code", $this->DataSource->f("code"));
                   $this->module_image->Parameters = CCAddParam($this->module_image->Parameters, "module_image", $this->DataSource->f("md_on"));
                   $this->code_off->Visible=false;
                   $this->code->Visible=true;
                }
                $this->code->SetValue($this->DataSource->code->GetValue());
                $this->code_off->SetValue($this->DataSource->code_off->GetValue());
                $this->Attributes->SetValue("numberOfColumns", 4);
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->RowOpenTag->Show();
                $this->RowComponents->Show();
                $this->RowCloseTag->Show();
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
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

//GetErrors Method @2-53029727
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->module_image->Errors->ToString());
        $errors = ComposeStrings($errors, $this->code->Errors->ToString());
        $errors = ComposeStrings($errors, $this->code_off->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End ModulGrid Class @2-FCB6E20C

class clsModulGridDataSource extends clsDBConn {  //ModulGridDataSource Class @2-4A62C78B

//DataSource Variables @2-0AD32890
    var $Parent = "";
    var $CCSEvents = "";
    var $CCSEventResult;
    var $ErrorBlock;
    var $CmdExecution;

    var $CountSQL;
    var $wp;


    // Datasource fields
    var $module_image;
    var $code;
    var $code_off;
//End DataSource Variables

//DataSourceClass_Initialize Event @2-C92F5077
    function clsModulGridDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid ModulGrid";
        $this->Initialize();
        $this->module_image = new clsField("module_image", ccsMemo, "");
        
        $this->code = new clsField("code", ccsText, "");
        $this->code_off = new clsField("code_off", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @2-D5886042
    function SetOrder($SorterName, $SorterDirection)
    {
//       $this->Order = "NVL(LISTING_NO,999)";
       $this->Order = "";
       $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            "");
    }
//End SetOrder Method

//Prepare Method @2-14D6CD9D
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
    }
//End Prepare Method

//Open Method @2-10C247DB
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);

        $isdamin=0;
        
        if (CCGetUserID()==1) $isadmin=1;
        $dbConn__ = new clsDBConn();
        $dbConn__->query("select count(*) jml from p_user_role where p_role_id=1 and p_user_id=" . CCGetUserID());
        if ($dbConn__->next_record() )
        {
           if ($dbConn__->f("jml")>0) $isadmin=1;
        }
        $dbConn__->close();

		if ($isadmin==1) {
			  $this->SQL = "select aa.p_application_id, aa.code, aa.description, 1 is_on, aa.md_on " .
							 "from v_display_app(1,0.0) aa ";
		} else {             

			  $this->SQL = "select aa.p_application_id, aa.code, aa.description, 1 is_on, aa.md_on " .
							 "from v_display_app(0," . ccgetuserid() . " ) aa "; 
		}             

        $this->CountSQL = "SELECT COUNT(*) FROM (" . $this->SQL . ") a ";
        
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

//SetValues Method @2-F814E68C
    function SetValues()
    {
        $this->module_image->SetDBValue($this->f("md_on"));
        $this->code->SetDBValue($this->f("code"));
        $this->code_off->SetDBValue($this->f("code"));
    }
//End SetValues Method

} //End ModulGridDataSource Class @2-FCB6E20C

//Initialize Page @1-B7BCE75E
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
$TemplateFileName = "module.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "../";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Include events file @1-E82335FD
include_once("./module_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-D589958F
$DBTRBConn = new clsDBConn();
$MainPage->Connections["TRBConn"] = & $DBTRBConn;
$Attributes = new clsAttributes("page:");
$MainPage->Attributes = & $Attributes;

// Controls
$ModulGrid = & new clsGridModulGrid("", $MainPage);
$MainPage->ModulGrid = & $ModulGrid;
$ModulGrid->Initialize();

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

//Go to destination page @1-185312AD
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBConn->close();
    header("Location: " . $Redirect);
    unset($ModulGrid);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-318D42A6
$ModulGrid->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-794FCE94
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBConn->close();
unset($ModulGrid);
unset($Tpl);
//End Unload Page


?>
