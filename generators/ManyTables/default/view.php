<?php
echo "<?php\n";
?>
use Webix\Asset\WebixAsset;
WebixAsset::register($this);
<?= "?>" ?>
<div id="layout" style="position: absolute; width:100%; height: 100%;"> </div>
<script type="text/javascript" charset="utf-8">


    new webix.ui({
        container: "layout",
        multi:true,
        id: "accordion_layout",
        view:"accordion",
        rows:[
            {height:40},
            {cols:[
                { header: "Navigation", body:createTree()},
                { view: "resizer"},
                { header: "<?=$controllerName?>", body:createGrid(), gravity:3 }
            ]
            }
        ],
        on: {
            onAfterExpand: function(){
                this.adjust();
            }

        }
    });

    function createTree(){
        return {
            view: "tree",
            data:
                [
                    {id:0, value:"Tables", open: true, data: [
                        <?php foreach ($tables as $table): ?>
                        {id:"<?=$table['url']?>", value:"<?=$table['name']?>"}<?=$table['comma']?>
                        <?php endforeach;?>
                    ]}
                ],
            ready:function(){ this.select("<?=$controllerName?>/table"); },
            select:true,
            on: {
                onItemClick:  function(id){
                    document.location =  "<?= Yii::$app->homeUrl?>"+id;
                }
            }
        };
    }

    function createGrid(){
        return {
            rows: [
                {
                    view:"toolbar",
                    elements: [
                        {
                            view: "button",
                            value: "Add new row",
                            maxWidth: 100,
                            click: webix.bind(function(){
                                var id = webix.uid();
                                $$("grid").add({Id: id}, 0);
                            }, this)
                        },
                        {
                            view: "button",
                            value: "Remove",
                            maxWidth: 100,
                            click: webix.bind(function(){
                                var sel = $$("grid").getSelectedId();
                                $$("grid").editStop();
                                if(sel) $$("grid").remove(sel);
                            }, this)
                        }
                    ]
                },
                {
                    view:"datatable",
                    id: "grid",
                    editable: true,
                    columns: [
                        <?php foreach ($fields as $number => $field): ?>
                        { id: "<?=$field?>", name: "<?=$headers[$number]?>", editor: "text" },
                        <?php endforeach;?>
                    ],
                    select:true,
                    url: "./table_data",
                    save: "connector->./table_data"
                }
            ]

        };
    }

    if(window.attachEvent) {
        window.attachEvent('onresize', function() {
            if($$('accordion_layout'))
                $$('accordion_layout').resize();
        });
    }
    else if(window.addEventListener) {
        window.addEventListener('resize', function() {
            if($$('accordion_layout'))
                $$('accordion_layout').resize();
        }, true);
    }
    else {
        //The browser does not support Javascript event binding
    }



</script>