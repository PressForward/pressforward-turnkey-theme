var jqueryNoConflict = jQuery;

// begin main function
jqueryNoConflict(document).ready(function(){

    initializeTabletopObject("https://docs.google.com/spreadsheets/d/1iq_6GhN_EwwlY5gLNOC6IhqIjUNTVNgtVEuJThckzMs/pubhtml");

});

// pull data from google spreadsheet
function initializeTabletopObject(dataSpreadsheet){
    Tabletop.init({
        key: dataSpreadsheet,
        callback: writeTableWith,
        simpleSheet: true,
        debug: false
    });
}

// create table headers
function createTableColumns(){

    /* swap out the properties of mDataProp & sTitle to reflect
    the names of columns or keys you want to display.
    Remember, tabletop.js strips out spaces from column titles, which
    is what happens with the More Info column header */

    var tableColumns =   [
        {"mDataProp": "Name", "sTitle": "Name", "sClass": "left"},
        {"mDataProp": "Twitter Handle", "sTitle": "Twitter Handle", "sClass": "left"},
        {"mDataProp": "Institutional Affiliation", "sTitle": "Institutional Affliation", "sClass": "left"},
        {"mDataProp": "September 5 - September 11", "sTitle": "September 5 - September 11", "sClass": "left"},
        {"mDataProp": "September 12 - September 18", "sTitle": "September 12 - September 18", "sClass": "left"},
        {"mDataProp": "September 19 - September 25", "sTitle": "September 19 - September 25", "sClass": "left"},
        {"mDataProp": "September 26 - October 2", "sTitle": "September 26 - October 2", "sClass": "left"},
        {"mDataProp": "October 3 - October 9", "sTitle": "October 3 - October 9", "sClass": "left"},
        {"mDataProp": "October 10 - October 16", "sTitle": "October 10 - October 16", "sClass": "left"},
        {"mDataProp": "October 17 - October 23", "sTitle": "October 17 - October 23", "sClass": "left"},
        {"mDataProp": "October 24 - October 30", "sTitle": "October 24 - October 30", "sClass": "left"},
        {"mDataProp": "October 31 - November 6", "sTitle": "October 31 - November 6", "sClass": "left"},
        {"mDataProp": "November 7 - November 13", "sTitle": "November 7 - November 13", "sClass": "left"},
        {"mDataProp": "November 14 - November 20", "sTitle": "November 14 - November 20", "sClass": "left"},
        {"mDataProp": "November 21 - November 27", "sTitle": "November 21 - November 27", "sClass": "left"},
        {"mDataProp": "November 28 - December 4", "sTitle": "November 28 - December 4", "sClass": "left"},
        {"mDataProp": "December 5 - December 11", "sTitle": "December 5 - December 11", "sClass": "left"},
        {"mDataProp": "December 12 - December 18", "sTitle": "December 12 - December 18", "sClass": "left"},

  ];
    return tableColumns;
}

// create the table container and object
function writeTableWith(dataSource){

    jqueryNoConflict("#food").html("<table cellpadding='0' cellspacing='0' border='0' class='display table table-bordered table-striped' id='data-table-container'></table>");

    var oTable = jqueryNoConflict("#data-table-container").dataTable({
        "sPaginationType": "full_numbers",
        "iDisplayLength": 25,
        "aaData": dataSource,
        "aoColumns": createTableColumns(),
        // "fnRowCallback": function(nRow, aData, iDisplayIndex) {
        //     console.log(aData);
        //     $("td:eq(2)", nRow).html("<a href='http://" + aData.website + "'>Website</a>");
        //     return nRow;
        // },
        "oLanguage": {
            "sLengthMenu": "_MENU_ records per page"
        }
    });

};

//define two custom functions (asc and desc) for string sorting
jQuery.fn.dataTableExt.oSort["string-case-asc"]  = function(x,y) {
  return ((x < y) ? -1 : ((x > y) ?  0 : 0));
};

jQuery.fn.dataTableExt.oSort["string-case-desc"] = function(x,y) {
  return ((x < y) ?  1 : ((x > y) ? -1 : 0));
};