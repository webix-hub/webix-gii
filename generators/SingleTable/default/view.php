<div id="layout_div" style="width:auto; height:800px;"> </div>
<!--<p><a href="javascript:void(0)" onclick="var id=mygrid.uid(); mygrid.addRow(id,'',0); mygrid.showRow(id);">Add row</a></p>-->
<!--<p><a href="javascript:void(0)" onclick="mygrid.deleteSelectedItem()">Remove Selected Row</a></p>-->
<script defer="defer" type="text/javascript" charset="utf-8">

    webix.ui({
        container:"layout_div",
        id:"layout",
        rows:[
            {cols:[
                {
                    id:"tree",
                    template:"column 1"
                },
                {
                    view:"resizer",
                    id:"resizer"
                },
                {
                    id:"datatable"
                    template:"column 2"
                }
            ]
            }
        ]
    }).show();

    var datatable = webix.ui({
        view:"datatable",
        container:"datatable"
    })

</script>