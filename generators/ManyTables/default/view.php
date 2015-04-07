<?php
echo "<?php\n";
?>
use Webix\Asset\WebixAsset;
WebixAsset::register($this);
<?= "?>" ?>


<script type="text/javascript" charset="utf-8">


    new webix.ui({
        parent: document.body,
        multi:true,
        view:"accordion",
        cols:[
            { header: "Navigation", body:createTree()},
            { view: "resizer"},
            { header: "Currency", body:createGrid(), gravity:3 }
        ]
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
                    save: "./table_data"
                }
            ]

        };
    }



</script>