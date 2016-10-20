<?php
/*
 Reportico - PHP Reporting Tool
 Copyright (C) 2010-2013 Peter Deed

 This program is free software; you can redistribute it and/or
 modify it under the terms of the GNU General Public License
 as published by the Free Software Foundation; either version 2
 of the License, or (at your option) any later version.
 
 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 GNU General Public License for more details.

 You should have received a copy of the GNU General Public License
 along with this program; if not, write to the Free Software
 Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.

 * File:        maintain.php
 *
 * This is the core Reportico Reporting Engine. The main 
 * reportico class is responsible for coordinating
 * all the other functionality in reading, preparing and
 * executing Reportico reports as well as all the screen
 * handling.
 *
 * @link http://www.reportico.co.uk/
 * @copyright 2010-2013 Peter Deed
 * @author Peter Deed <info@reportico.org>
 * @package Reportico
 * @license - http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 * @version : reportico.php,v 1.58 2013/04/24 22:03:22 peter Exp $
 */
$locale_arr = array (
    "language" => "English",
    "template" => array (
        "T_OK" => "موافق",
        "T_ADD" => "إضافة",
        "T_PROJECT_MENU" => "مشروع القائمة",
        "T_ADMIN_MENU" => "مشرف القائمة",
        "T_RUN_REPORT" => "تشغيل تقرير",
        "T_DELETE_REPORT" => "حذف تقرير",
        "T_INFORMATION" => "معلومات",
        "T_GEN_WEB_SERVICE" => "إنشاء خدمة ويب",
        "T_DESIGN_PASSWORD_PROMPT" => "كلمة السر لوضع التصميم",
        "T_LOGIN" => "تسجيل الدخول",
        "T_LOGOFF" => "تسجيل الخروج",
        "T_CUSTOMSOURCECODE" => "عرف المصدر مدونة",
        "T_SAFEOFF" => "(إيقاف تشغيل الوضع الآمن في التصميم <BR> مشروع التكوين <BR> لتمكين هذه الميزة)",
        "T_GO" => "الذهاب",
        "T_PROJECT" => "المشروع:",
        "T_SAVE" => "حفظ",
        "T_REPORT_FILE" => "الإبلاغ عن ملف",
        "T_NEW_REPORT" => "تقرير جديد",
        "T_ENTER_PROJECT_PASSWORD" => "أدخل كلمة المرور المشروع.",
        "T_QUERY_DETAILS" => "الاستعلام تفاصيل",
        "T_OUTPUT" => "إنتاج",
        "T_CRITERIA" => "المعايير",
        "T_CRITERIADEFAULTS" => "التخلف",
        "T_ASSIGNMENTS" => "تعيينات",
        "T_ASSIGNMENT" => "مهمة",
        "T_FORMAT" => "شكل",
        "T_PAGE_HEADERS" => "صفحة الرؤوس",
        "T_PAGE_FOOTERS" => "صفحة الهوامش",
        "T_DISPLAY_ORDER" => "عرض طلب",
        "T_GROUPS" => "المجموعات",
        "T_GRAPHS" => "الرسوم البيانية",
        "T_QUERY_COLUMNS" => "الاستعلام أعمدة",
        "T_ORDER_BY" => "النظام عن طريق",
        "T_PRESQLS" => "قبل SQLs",
        "T_PLOTS" => "المؤامرات",
        "T_DETAILS" => "تفاصيل",
        "T_HEADERS" => "رؤوس",
        "T_TRAILERS" => "المقطورات",
        "T_SQL" => "SQL",
        "T_LINKS" => "وصلات",
        "T_QUERYSQL" => "",
        "T_NAME" => "اسم",
        "T_SQLTEXT" => "SQL نص",
        "T_QUERYCOLUMNNAME" => "الاستفسار الرئيسي في العمود",
        "T_REPORTTITLE" => "التقرير عنوان",
        "T_REPORTDESCRIPTION" => "وصف تقرير",
        "T_LINKFROM" => "الرابط من",
        "T_LINKTO" => "ربط",
        "T_LINKCLAUSE" => "رابط المادة",
        "T_ASSIGNNAME" => "تعيين",
        "T_ASSIGNNAMENEW" => "تعيين إلى عمود جديد",
        "T_EXPRESSION" => "التعبير",
        "T_CONDITION" => "حالة",
        "T_ASSIGNAGGTYPE" => "إجمالي نوع",
        "T_ASSIGNAGGCOL" => "إجمالي العمود",
        "T_ASSIGNAGGGROUP" => "مجمعة حسب",
        "T_ASSIGNGRAPHICBLOBCOL" => "العمود الذي يحتوي على رسومات",
        "T_ASSIGNGRAPHICBLOBTAB" => "جدول يحتوي على رسومات",
        "T_ASSIGNGRAPHICBLOBMATCH" => "عمود إلى تقرير المباراة الجرافيك",
        "T_ASSIGNGRAPHICWIDTH" => "تقرير العرض الجرافيكي",
        "T_ASSIGNGRAPHICREPORTCOL" => "رسم تقرير العمود",
        "T_DRILLDOWNREPORT" => "Drilldown تقرير",
        "T_DRILLDOWNCOLUMN" => "Drilldown عمود للمعايير",
        "T_GROUPNAME" => "مجموعة على عمود",
        "T_GRAPHCOLUMN" => "مجموعة العمود",
        "T_GRAPHHEIGHT" => "الرسم البياني الارتفاع",
        "T_GRAPHWIDTH" => "رسم بياني العرض",
        "T_GRAPHCOLOR" => "رسم بياني اللون",
        "T_GRAPHWIDTHPDF" => "عرض رسم بياني (PDF)",
        "T_GRAPHHEIGHTPDF" => "ارتفاع الرسم البياني (PDF)",
        "T_XTITLE" => "X المحور عنوان",
        "T_YTITLE" => "Y محور العنوان",
        "T_GRIDPOSITION" => "شبكة الموقع",
        "T_PLOTSTYLE" => "مؤامرة ستايل",
        "T_LINECOLOR" => "خط اللون",
        "T_DATATYPE" => "نوع البيانات",
        "T_FILLCOLOR" => "ملء اللون",
        "T_LEGEND" => "أسطورة",
        "T_XGRIDCOLOR" => "X-الشبكة اللون",
        "T_YGRIDCOLOR" => "Y-الشبكة اللون",
        "T_TITLEFONTSIZE" => "لقب حجم الخط",
        "T_XTICKINTERVAL" => "X القراد الفاصل",
        "T_YTICKINTERVAL" => "Y القراد الفاصل",
        "T_XTICKLABELINTERVAL" => "X الفاصل الزمني القراد تسمية",
        "T_YTICKLABELINTERVAL" => "Y الفاصل القراد تسمية",
        "T_XTITLEFONTSIZE" => "X الحجم عنوان الخط",
        "T_YTITLEFONTSIZE" => "Y الحجم عنوان الخط",
        "T_MARGINCOLOR" => "هامش اللون",
        "T_MARGINLEFT" => "بقي من الهامش",
        "T_MARGINRIGHT" => "الهامش الأيمن",
        "T_MARGINTOP" => "الهامش الأعلى",
        "T_MARGINBOTTOM" => "هامش القاع",
        "T_TITLECOLOR" => "لقب اللون",
        "T_XAXISCOLOR" => "X محور اللون",
        "T_YAXISCOLOR" => "Y محور اللون",
        "T_XAXISFONTCOLOR" => "X لون محور الخط",
        "T_YAXISFONTCOLOR" => "واي لون محور الخط",
        "T_XAXISFONTSIZE" => "X الحجم محور الخط",
        "T_YAXISFONTSIZE" => "Y الحجم محور الخط",
        "T_XTITLECOLOR" => "X عنوان اللون",
        "T_YTITLECOLOR" => "Y عنوان اللون",
        "T_PLOTCOLUMN" => "عمود لرسم",
        "T_XLABELCOLUMN" => "عمود للتسميات X",
        "T_YLABELCOLUMN" => "عمود للتسميات Y",
        "T_RETURNCOLUMN" => "عودة العمود",
        "T_MATCHCOLUMN" => "تطابق العمود",
        "T_DISPLAYCOLUMN" => "عرض العمود",
        "T_OVERVIEWCOLUMN" => "ملخص العمود",
        "T_CONTENTTYPE" => "نوع المحتوى",
        "T_CUSTOMSOURCE" => "CustomSource",
        "T_PAGESIZE" => "حجم الصفحة (PDF)",
        "T_PAGEWIDTHHTML" => "عرض صفحة (HTML)",
        "T_PAGEORIENTATION" => "توجه (PDF)",
        "T_TOPMARGIN" => "أعلى الهامش (PDF)",
        "T_BOTTOMMARGIN" => "الهامش السفلي (PDF)",
        "T_RIGHTMARGIN" => "حق الهامش (PDF)",
        "T_LEFTMARGIN" => "اليسار الهامش (PDF)",
        "T_PDFFONT" => "الخط (PDF)",
        "T_ORDERNUMBER" => "أمر عدد",
        "T_BEFOREGROUPHEADER" => "قبل رأس المجموعة",
        "T_AFTERGROUPHEADER" => "بعد رأس المجموعة",
        "T_BEFOREGROUPTRAILER" => "قبل مقطورة المجموعة",
        "T_AFTERGROUPTRAILER" => "بعد مقطورة المجموعة",
        "T_BODYDISPLAY" => "عرض تفاصيل",
        "T_GRAPHDISPLAY" => "عرض الرسم البياني",
        "T_GRIDDISPLAY" => "عرض الشبكة؟",
        "T_GRIDSORTABLE" => "أعمدة للفرز في الشبكة؟",
        "T_GRIDSEARCHABLE" => "iمربع البحث؟",
        "T_GRIDPAGEABLE" => "شبكات مع ترحيل؟",
        "T_GRIDPAGESIZE" => "شبكات حجم الصفحة",
        "T_yes" => "نعم",
        "T_no" => "لا",
        "T_GROUPHEADERCOLUMN" => "مجموعة رأس العمود",
        "T_GROUPTRAILERDISPLAYCOLUMN" => "عمود مجموعة مقطورة العرض",
        "T_GROUPTRAILERVALUECOLUMN" => "مجموعة قيمة العمود مقطورة",
        "T_LINENUMBER" => "خط الأعداد",
        "T_HEADERTEXT" => "رأس النص",
        "T_FOOTERTEXT" => "تذييل النص",
        "T_COLUMNSTARTPDF" => "بدء عمود (PDF)",
        "T_COLUMNWIDTHPDF" => "عرض العمود (PDF)",
        "T_COLUMNWIDTHHTML" => "عرض العمود (HTML)",
        "T_COLUMN_TITLE" => "عنوان العمود",
        "T_TOOLTIP" => "أداة تلميح",
        "T_GROUP_HEADER_LABEL" => "رأس المجموعة تسمية",
        "T_GROUP_TRAILER_LABEL" => "مجموعة مقطورة التسمية",
        "T_GROUP_HEADER_LABEL_XPOS" => "ابدأ رأس المجموعة تسمية",
        "T_GROUP_HEADER_DATA_XPOS" => "ابدأ رأس المجموعة القيمة",
        "T_PDFFONTSIZE" => "حجم الخط (PDF)",
        "T_XGRIDDISPLAY" => "X-نمط الشبكة",
        "T_YGRIDDISPLAY" => "Y-نمط الشبكة",
        "T_PLOTTYPE" => "مؤامرة ستايل",
        "T_IMPORTREPORT" => "الاستيراد من تقرير",
        "T_IMPORTREPORTITEM" => "والبند",
        "T_MAKELINKTOREPORT" => "إنشاء وصلات للإبلاغ",
        "T_MAKELINKTOREPORTITEM" => "والبند",
        "T_LINKTOREPORT" => "ربط تقرير",
        "T_LINKTOREPORTITEM" => "ترتبط عن صنف",
        "T_ALLITEMS" => "جميع الأصناف",
        "T_CRITERIALIST" => "قائمة القيم",
        "T_TITLE" => "لقب",
        "T_CRITERIATYPE" => "نوع المعايير",
        "T_CRITERIAHELP" => "معايير مساعدة",
        "T_USE" => "استخدم",
        "T_CRITERIADISPLAY" => "معايير العرض",
        "T_EXPANDDISPLAY" => "توسيع عرض",
        "T_DATABASETYPE" => "مصدر البيانات نوع",
        "T_JUSTIFY" => "مبرر",
        "T_COLUMN_DISPLAY" => "إظهار أو إخفاء؟",
        "T_TITLEFONT" => "عنوان الخط",
        "T_TITLEFONTSTYLE" => "عنوان نمط الخط",
        "T_XTITLEFONT" => "X عنوان الخط",
        "T_YTITLEFONT" => "Y عنوان الخط",
        "T_XAXISFONT" => "X تسمية الخط",
        "T_YAXISFONT" => "Y تسمية الخط",
        "T_XAXISFONTSTYLE" => "X تسمية نمط",
        "T_YAXISFONTSTYLE" => "Y تسمية نمط",
        "T_XTITLEFONTSTYLE" => "X نمط عنوان الخط",
        "T_YTITLEFONTSTYLE" => "Y نمط عنوان الخط",
        "T_.DEFAULT" => "الافتراضي",
        "T_Portrait" => "صورة",
        "T_Landscape" => "المشهد",
        "T_B5" => "B5",
        "T_A6" => "A6",
        "T_A5" => "A5",
        "T_A4" => "A4",
        "T_A3" => "A3",
        "T_A2" => "A2",
        "T_A1" => "A1",
        "T_US-Letter" => "الولايات المتحدة رسالة",
        "T_US-Legal" => "الولايات المتحدة القانونية",
        "T_US-Ledger" => "الولايات المتحدة ليدجر",
        "T_hide" => "إخفاء",
        "T_show" => "إظهار",
        "T_plain" => "عادي",
        "T_graphic" => "الرسم",
        "T_left" => "غادر",
        "T_right" => "حق",
        "T_center" => "مركز",
        "T_SUM" => "مجموع",
        "T_AVERAGE" => "متوسط",
        "T_MAX" => "أقصى",
        "T_MIN" => "الحد الأدنى",
        "T_PREVIOUS" => "سابق",
        "T_SKIPLINE" => "تخطي الخط",
        "T_COUNT" => "عد",
        "T_TEXTFIELD" => "نص الميدانية",
        "T_LOOKUP" => "قاعدة بيانات بحث",
        "T_DATE" => "تاريخ",
        "T_DATERANGE" => "تاريخ المدى",
        "T_SQLCOMMAND" => "أمر SQL",
        "T_LIST" => "عرف قائمة",
        "T_NOINPUT" => "أي إدخال",
        "T_DROPDOWN" => "القائمة المنسدلة",
        "T_MULTI" => "العديد من صندوق اختيار قائمة",
        "T_CHECKBOX" => "خانات",
        "T_RADIO" => "أزرار الراديو",
        "T_DMYFIELD" => "حقول التاريخ (D / M / Y)",
        "T_MDYFIELD" => "حقول التاريخ (M / D / Y)",
        "T_YMDFIELD" => "حقول التاريخ (Y / M / D)",
        "T_blankline" => "فارغة الخط",
        "T_solidline" => "الصلبة الخط",
        "T_newpage" => "صفحة جديدة",
        "T_SQLLIMITFIRST" => "الحد / اضافة اولى",
        "T_SQLSKIPOFFSET" => "تخطي / موازنة",
        "T_PAGE_HEADER" => "رأس الصفحة",
        "T_PAGE_FOOTER" => "تذييل الصفحة",
        "T_GROUP" => "مجموعة",
        "T_HEADER" => "رأس",
        "T_TRAILER" => "مقطورة",
        "T_PLOT" => "مؤامرة",
        "T_PRESQL" => "PreSQL",
        "T_COLUMNNAME" => "عمود",
        "T_CRITERIAITEM" => "المعايير",
        "T_GRAPH" => "رسم بياني",
        "T_BOLD" => "جريء",
        "T_ITALIC" => "مائل",
        "T_BOLDANDITALIC" => "الغامق والمائل",
        "T_STRIKETHROUGH" => "ضرب خلال",
        "T_NORMAL" => "طبيعي",
        "T_UNDERLINE" => "تسطير",
        "T_OVERLINE" => "ضع سطرا",
        "T_BLINK" => "وميض",
        "T_NONE" => "لا شيء",
        "T_NOBORDER" => "لا حدود",
        "T_SOLIDLINE" => "الصلبة الخط",
        "T_DASHED" => "خط متقطع",
        "T_DOTTED" => "الخط المنقط",
        "T_CELL" => "الخلية",
        "T_ALLCELLS" => "جميع الخلايا في الصف",
        "T_COLUMNHEADERS" => "رؤوس الأعمدة",
        "T_ROW" => "صف",
        "T_PAGE" => "صفحة",
        "T_BODY" => "تقرير الهيئة",
        "T_GROUPHEADERLABEL" => "رأس المجموعة تسمية",
        "T_GROUPHEADERVALUE" => "رأس المجموعة القيمة",
        "T_GROUPTRAILER" => "مجموعة مقطورة",
        "T_ASSIGNSTYLELOCTYPE" => "تطبيق النمط ل",
        "T_ASSIGNSTYLEFGCOLOR" => "اللون النص (اسم اللون أو rrggbb #)",
        "T_ASSIGNSTYLEBGCOLOR" => "لون الخلفية (# rrggbb)",
        "T_ASSIGNSTYLEBORDERSTYLE" => "نمط الحدود",
        "T_ASSIGNSTYLEBORDERSIZE" => "سمك الحدود (أعلى أسفل اليسار إلى اليمين)",
        "T_ASSIGNSTYLEBORDERCOLOR" => "لون الحدود (اسم اللون أو ffggbb #)",
        "T_ASSIGNSTYLEMARGIN" => "هامش (أعلى أسفل اليسار إلى اليمين)",
        "T_ASSIGNSTYLEPADDING" => "الحشو (أعلى أسفل اليسار إلى اليمين)",
        "T_ASSIGNWIDTH" => "عرض",
        "T_ASSIGNFONTSIZE" => "حجم الخط",
        "T_ASSIGNFONTSTYLE" => "نمط الخط",
        "T_ASSIGNHYPERLABEL" => "تسمية الارتباط التشعبي",
        "T_ASSIGNHYPERURL" => "الارتباط التشعبي URL",
        "T_ASSIGNIMAGEURL" => "صورة URL",
        "T_ENTERSQL" => "دخول SQL",
        "T_ENTERCLAUSE" => "أدخل شرط",
        "T_UNABLE_TO_CONTINUE" => "غير قادر على الاستمرار",
        "T_UNABLE_TO_SAVE" => "غير قادر على حفظ",
        "T_UNABLE_TO_REMOVE" => "غير قادر على إزالة",
        "T_SPECIFYXML" => " - يجب تحديد اسم ملف التقرير مع.",
        "T_MUSTADDGROUP" => "إضافة إلى رسم بياني كنت بحاجة للذهاب إلى القائمة المجموعات إضافة مجموعة التي لتحريك الرسم البياني. إضافة إلى رسم بياني في نهاية التقرير، تحتاج إلى إضافة مجموعة تسمى REPORT_BODY ثم حدد هذا على أنه العمود المجموعة",
        "T_SAFENOSAVE" => "يعمل في الوضع الآمن. قد لا تعريفات تقرير يتم حفظها.",
        "T_SAFENODEL" => "يعمل في الوضع الآمن. قد لا يمكن حذف تعريفات تقرير.",
        "T_NOCRITLINK" => "أي عناصر المعايير المتاحة لربط في",
        "T_NOOPENLINK" => "غير قادر على فتح تقرير لتصل إلى - ملف",
        "T_NOOPENDIR" => "غير قادر على فتح الدليل",
        "T_XMLCONFILE" => "تقرير ملف تكوين XML",
        "T_XMLFORM" => "يجب أن تكون في شكل {reportname}. XML",
        "T_NOWRITE" => "لم يكن لدى المستخدم أذونات الكتابة على ملف",
        "T_NOFILE" => "الملف غير موجود",
        "T_REPORTFILE" => "الإبلاغ عن ملف",
        "T_DELETEOKACT" => "حذف بنجاح. تعريف التقرير ما تزال نشطة. إذا كنت لا يعني حذف تقرير يمكنك الضغط على زر حفظ لإعادة إنشائها",
        "T_OUTPUTIMAGE" => "صورة URL معالج",
        "T_OUTPUTHYPERLINK" => "التشعبي معالج",
        "T_OUTPUTSTYLESWIZARD" => "خرج أنماط معالج",
        "T_AGGREGATESWIZARD" => "المجاميع معالج",
        "T_DATABASEGRAPHICWIZARD" => "قاعدة بيانات معالج الجرافيك",
        "T_DRILLDOWNWIZARD" => "Drilldown معالج",
        "T_ROWSTYLE" => "صف اللغة",
        "T_PAGESTYLE" => "صفحة نمط",
        "T_COLUMNHEADERSTYLE" => "رأس العمود ستايل",
        "T_REPORTBODYSTYLE" => "تقرير شكل الهيكل",
        "T_ALLCELLSSTYLE" => "جميع خلايا ستايل",
        "T_CELLSTYLE" => "عمود نمط",
        "T_GRPHEADERLABELSTYLE" => "نمط رأس المجموعة تسمية",
        "T_GRPHEADERVALUESTYLE" => "نمط رأس المجموعة القيمة",
        "T_GROUPTRAILERSTYLE" => "مجموعة مقطورة ستايل",
        "T_INVALIDENTRY" => "دخول غير صالحة -",
        "T_FORFIELD" => "عن الميدان -",
        "T_PAGEMARGINWITHWIDTH" => "تحذير - عند تحديد هامش صفحة يجب تعيين ربما عرض الصفحة بالإضافة",
        "T_SETBORDERSTYLE" => "إذا وضع سمك الحدود أو اللون، وينبغي أن نمط الحدود لا يكون لا شيء",
        "T_HTMLCOLOR" => "يجب أن يكون لون قيمة RGB في تنسيق HTML (# rrggbb)",
        "T_CSSFONTSIZE" => "يجب أن يكون حجم الخط حجم الخط بعد اختياري من قبل 'حزب العمال'",
        "T_CSS1SIZE" => "يجب أن يكون حجم قيمة حجم المغلق، اما عدد يليه من 'px' أو '٪'",
        "T_CSS4SIZE" => "يجب أن يكون حجم مساحة 4 بفواصل أرقام (للأعلى، اليسار، أسفل، يمين) في كل عدد يليه من 'px' أو '٪'",
        "T_NUMBER" => "يجب أن تكون القيمة عدد",
        "T_FORMBETWEENROWS" => "شكل نمط فاصل صف",
        "T_ASSIGNHEIGHT" => "ارتفاع",
        "T_PAGEHEADERSTYLES" => "الأساليب",
        "T_PAGEFOOTERSTYLES" => "الأساليب",
        "T_SHOWINPDF" => "تظهر في PDF",
        "T_SHOWINHTML" => "تظهر في HTML",
        "T_RELATIVE" => "قريب",
        "T_ABSOLUTE" => "مطلق",
        "T_GROUPHEADERCUSTOM" => "المجموعة نص رأس مخصص",
        "T_GROUPHEADERSTYLES" => "الأساليب",
        "T_GROUPTRAILERCUSTOM" => "المجموعة نص مقطورة مخصصة",
        "T_GROUPTRAILERSTYLES" => "الأساليب",
        "T_ASSIGNSTYLEPOSITION" => "بالنسبة للموقف الحالي أو الصفحة",
        "T_ASSIGNFONTNAME" => "اسم الخط",
        "T_ASSIGNPDFBACKGROUNDIMAGE" => "الصورة الخلفية",
        "T_SELECT2SINGLE" => "مربع قائمة واحدة للبحث",
        "T_SELECT2MULTIPLE" => "مربع قائمة متعددة للبحث",
        "T_CRITERIAHIDDEN" => "إخفاء معايير",
        "T_CRITERIAREQUIRED" => "المعايير المطلوبة",
        )
        );
?>
