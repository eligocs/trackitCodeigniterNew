 <!--Chart Section-->
 <?php $get_agents = get_all_sales_team_agents(); ?>
 <div class="row">
     <div class="col-md-6">
         <div class="titile_section">
             <h3 class="col-md-6 row">Itineraries</h3>
             <div class="row">
                <div class="col-md-6">
                    <label for="sel1">Select Agent:</label>
                    <select class="form-control" id="agent_graph">
                        <option value="">All Agents</option>
                        <?php
                                if ($get_agents) {
                                    foreach ($get_agents as $agent) {
                                        echo "<option value={$agent->user_id} >{$agent->user_name}</option>";
                                    }
                                }
                                ?>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="sel1">Select Date:</label>
                    <input type="text" autocomplete="off" class="form-control daterange dateHide" id="daterangelead"
                        name="daterangelead" value="" />
                </div>
             </div>
         </div>
         <div class="portlet-body card-padding chart-container">
             <div id="pieChart1" style="height:500px; padding:10px;"></div>
         </div>
     </div>
     <div class="col-md-6">
         <div class="col-md-12">
             <div class="titile_section">
                 <h3 class="col-md-12">Leads</h3>
                 <div class="col-md-6">
                 </div>
                 <div class="form-group col-md-6">
                     <label for="sel1">Select1 Date:</label>
                     <input type="text" autocomplete="off" class="form-control daterange dateHide"
                         id="daterangeLeadsfilter" name="daterangelead" value="" />
                 </div>
             </div>
             <div class="portlet-body card-padding">
                 <div id="chartdiv" class="element"></div>
                 <div id="legend"></div>
                 <button onclick="var el = document.getElementById('chartdiv'); el.requestFullscreen();">
                     Go Full Screen!
                 </button></p>
             </div>
         </div>
     </div>
     <div class="row">
         <div class="col-md-6">
             <div class="titile_section">
                 <h3 class="col-lg-12">LEADS GRAPH</h3>
                 <div class="form-group col-lg-6">
                     <label for="sel1">Select Agent:</label>
                     <select class="form-control" id="agent_graph_lead">
                         <option value="">All Agents</option>
                         <?php
                            if ($get_agents) {
                                foreach ($get_agents as $agent) {
                                    echo "<option value={$agent->user_id} >{$agent->user_name}</option>";
                                }
                            }
                            ?>
                     </select>
                 </div>
                 <div class="form-group col-md-6 pull-right">
                     <label for="sel1">Select Date:</label>
                     <input type="text" autocomplete="off" class="form-control daterange dateHide" id="leadsDate"
                         name="daterangelead" value="" />
                 </div>
             </div>
             <div class="portlet-body">
                 <div id="main" style="height: 400px"></div>
             </div>
         </div>
     </div>
 </div>
 <script>
$(document).ready(function() {
    // call to date filter
    leads_date_filter();
    hm_leads_chart();
    funel_chart();
});

//filter on  date change function
$("#daterangelead").focusout(function() {
    // $(".chart-pie-simple").html('')
    leads_date_filter();
});
//filter on  date change function leads
$("#leadsDate").focusout(function() {
    // $("#main").html('')
    hm_leads_chart();
});


//Leads //on agent change
$("#agent_graph").focusout(function() {
    leads_date_filter();
});

//on agent change
$("#agent_graph_lead").focusout(function() {
    hm_leads_chart();
});

$("#daterangeLeadsfilter").focusout(function() {
    funel_chart();
});


$(".daterange").daterangepicker({
    // autoApply: true, 
    autoUpdateInput: false,
    locale: {
        format: 'YYYY/MM/DD',
        cancelLabel: 'Clear'
    },
    ranges: {
        Today: [moment(), moment()],
        Yesterday: [
            moment().subtract(1, "days"),
            moment().subtract(1, "days"),
        ],
        "Last 7 Days": [moment().subtract(6, "days"), moment()],
        "Last 30 Days": [moment().subtract(29, "days"), moment()],
        "This Month": [moment().startOf("month"), moment().endOf("month")],
        "Last Month": [
            moment().subtract(1, "month").startOf("month"),
            moment().subtract(1, "month").endOf("month"),
        ],
    },
})
$('.daterange').on('apply.daterangepicker', function(ev, picker) {
    $(this).val(picker.startDate.format('YYYY/MM/DD') + ' - ' + picker.endDate.format('YYYY/MM/DD'));
});

$('.daterange').on('cancel.daterangepicker', function(ev, picker) {
    $(this).val('');
});
 </script>