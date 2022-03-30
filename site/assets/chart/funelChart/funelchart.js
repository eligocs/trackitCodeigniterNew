/* Chart start */
function funel_chart() {
    var selectedDate = $('#daterangeLeadsfilter').val();
    var BASE_URL = $("#base_url").val();
    $.ajax({
        url: BASE_URL + "dashboard/getDataByworkingType",
        method: "POST",
        dataType: 'json',
        data: {
            selectedDate: selectedDate

        },
        success: function(data) {

            am4core.useTheme(am4themes_animated);

            var chart = am4core.create("chartdiv", am4charts.SlicedChart);
            chart.data = data.totaldata;

            var series = chart.series.push(new am4charts.FunnelSeries());
            series.dataFields.value = "value";
            series.dataFields.category = "name";
            series.alignLabels = false;

            series.labels.template.adapter.add("text", slicePercent);
            series.slices.template.tooltipText = "{category}: {value}";

            /*slice percent */
            function slicePercent(text, target) {
                var max = target.dataItem.values.value.value - target.dataItem.values.value.startChange;
                var percent = Math.round(target.dataItem.values.value.value / max * 100);
                return "{category}: " + percent + "%";
            }

            chart.legend = new am4charts.Legend();
            chart.legend.useDefaultMarker = true;
            var marker = chart.legend.markers.template.children.getIndex(0);
            marker.cornerRadius(12, 12, 12, 12);
            marker.strokeWidth = 2;
            marker.strokeOpacity = 1;
            chart.legend.itemContainers.template.tooltipText = "{value}";
            chart.legend.valueLabels.template.disabled = true;

            series.colors.list = [
                am4core.color("#df2a2a"),
                am4core.color("#ffb339"),
                am4core.color("#4e69a2"),
                am4core.color("#9cc925")
            ];

            /* remove logo */
            let eles = document.querySelectorAll("[aria-labelledby$=-title]");
            eles.forEach((ele) => {
                ele.style.visibility = "hidden";
            })

            /*filter of data */
            fun = function toggleSlice(item) {
                var slice = series.dataItems.getIndex(item);
                if (slice.visible) {
                    slice.hide();
                } else {
                    slice.show();
                }
            }
            return fun;
        }
    });
};

$(document).on("click", '#quick-nav-triggered', function(e) {
    e.preventDefault();

    $.ajax({
        type: "POST",
        url: BASE_URL + 'Dashboard/renderModel',

        cache: true,
        dataType: "html",
        async: false,
        data: {

        },
        success: function(res) {
            $("#chart_sections").html(res);

        },
        error: function(e) {
            alert("error");

        }
    });
    $('#myModa20').modal('show');
});