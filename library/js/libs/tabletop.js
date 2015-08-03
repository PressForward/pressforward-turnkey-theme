var jqueryNoConflict = jQuery;

// begin main function
jqueryNoConflict(document).ready(function(){

    initializeTabletopObject("https://docs.google.com/spreadsheets/d/12rj9cindXkqbvVvFBPAj4u1A44QjRJeDBTtmzHKJGhs/pubhtml");

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
        {"mDataProp": "name", "sTitle": "Name", "sClass": "left"},
        {"mDataProp": "twitterhandle", "sTitle": "Twitter Handle", "sClass": "left"},
        {"mDataProp": "institutionalaffiliation", "sTitle": "Institutional Affliation", "sClass": "left"},
        {"mDataProp": "may16-may22", "sTitle": "May 16 - May 22", "sClass": "left"},
        {"mDataProp": "may23-may29", "sTitle": "May 23 - May 29", "sClass": "left"},
        {"mDataProp": "may30-june5", "sTitle": "May 30 - June 5", "sClass": "left"},
        {"mDataProp": "june6-june12", "sTitle": "June 6 - June 12", "sClass": "left"},
        {"mDataProp": "june13-june19", "sTitle": "June 13 - June 19", "sClass": "left"},
        {"mDataProp": "june20-june26", "sTitle": "June 20 - June 26", "sClass": "left"},
        {"mDataProp": "june27-july3", "sTitle": "June 27 - July 3", "sClass": "left"},
        {"mDataProp": "july4-july10", "sTitle": "July 4 - July 10", "sClass": "left"},
        {"mDataProp": "july11-july17", "sTitle": "July 11 - July 17", "sClass": "left"},
        {"mDataProp": "july18-july24", "sTitle": "July 18 - July 24", "sClass": "left"},
        {"mDataProp": "july25-july31", "sTitle": "July 25 - July 31", "sClass": "left"},
        {"mDataProp": "august1-august7", "sTitle": "August 1 - 7", "sClass": "left"},
        {"mDataProp": "august8-august14", "sTitle": "August 8 - August 14", "sClass": "left"},
        {"mDataProp": "august15-august21", "sTitle": "August 15 - August 21", "sClass": "left"},
        {"mDataProp": "august22-august28", "sTitle": "August 22 - August 28", "sClass": "left"},

  ];
    return tableColumns;
}

// create the table container and object
function writeTableWith(dataSource){

    jqueryNoConflict("#food").html("<table cellpadding='0' cellspacing='0' border='0' class='display table table-bordered table-striped' id='data-table-container'></table>");

    var oTable = jqueryNoConflict("#data-table-container").dataTable({
        "sPaginationType": "bootstrap",
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