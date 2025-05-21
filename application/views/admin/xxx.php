<!-- <script> 
        let listCate = [
        <?php  foreach($result_type as $row){?>
            {
                id: <?php echo $row->car_type_id;?>,
                name: <?php echo '"'.$row->name_type_th.'"';?>
            },
        <?php } ?>
        ];

        let listFamily = [
        <?php  foreach($result as $row){?>
            {
                id: <?php echo $row->car_id;?>,
                name: <?php echo '"'.$row->name_th.'"';?>,
                group: <?php echo $row->car_type_id;?>
            },
        <?php } ?>
        ];

        let listItem = [
        <?php  foreach($result_model as $row){?>
            {
                id: <?php echo $row->car_model_id;?>,
                name: <?php echo '"'.$row->name_model_th.'"';?>,
                group: <?php echo $row->car_id;?>
            },
        <?php } ?> 
        ];

        let listYear = [
        <?php  foreach($car_year_pro_text as $row){?>
            {
                id: <?php echo $row->name_year_pro;?>,
                name: <?php echo '"'.$row->name_year_pro.'"';?>,
                group: <?php echo $row->car_model_id;?>
            },
        <?php } ?> 
        ];

        let listItem2 = [
        <?php  foreach($result_model_des as $row){?>
            {
                id: <?php echo $row->car_model_des_id;?>,
                name: <?php echo '"'.$row->name_model_des_th.'"';?>,
                group: <?php echo $row->name_year_pro;?>
            },                                           
        <?php } ?>   
        ];

        function changeOption(event) {
            let target = event.target.id;
            let selectCate = document.getElementById('category'),
                selectFamily = document.getElementById('family'),
                selectItem = document.getElementById('item'),
                selectYear = document.getElementById('year'),
                selectItem2 = document.getElementById('item2');
            let jsonCate = listCate,
                jsonFamily = listFamily,
                jsonItem = listItem,
                jsonYear = listYear,
                jsonItem2 = listItem2;
            let targerEle = document.getElementById(target);
            if(target == 'category' && targerEle.value != '') {
                selectOption('family', targerEle.value, 'group');
                selectOption('item', 'none', 'group');
                selectOption('year', 'none', 'group');
                selectOption('item2', 'none', 'group');
            } else if(target == 'category' && targerEle.value == '') {
                selectOption('family', 'all', 'group');
                selectOption('item', 'all', 'group');
                selectOption('year', 'all', 'group');
                selectOption('item2', 'all', 'group');
            } else if(target == 'family') {
                selectOption('item', targerEle.value, 'group');
                selectOption('year', 'none', 'group');
                selectOption('item2', 'none', 'group');
            } else if(target == 'item') {
                selectOption('year', targerEle.value, 'group');
                selectOption('item2', 'none', 'group');
            } else if(target == 'year') {
                selectOption('item2', targerEle.value, 'group');
            }
        }
        
        function searchGroup(target, position) {
            switch (target) {
                case "category":
                    dataTarget = listCate;
                    break;
                case "family":
                    dataTarget = listFamily;
                    break;
                case "item":
                    dataTarget = listItem;
                    break;
                case "year":
                    dataTarget = listYear;
                    break;
                case "item2":
                    dataTarget = listItem2;
                    break;
            }
            for (var i = 0; i < dataTarget.length; i++) {
                if(dataTarget[i].id == position) {
                    return dataTarget[i].group;
                }
            }
        }

        function selectOption(target, position, pointer) {
            switch (target) {
                case "category":
                    defaultTarget = 'กรุณาเลือกประเภท';
                    selectTarget = document.getElementById('category');
                    dataTarget = listCate;
                    break;
                case "family":
                    defaultTarget = 'กรุณาเลือกยี่ห้อ';
                    selectTarget = document.getElementById('family');
                    dataTarget = listFamily;
                    break;
                case "item":
                    defaultTarget = 'กรุณาเลือกรุ่น';
                    selectTarget = document.getElementById('item');
                    dataTarget = listItem;
                    break;
                case "year":
                    defaultTarget = 'กรุณาเลือกปีผลิต';
                    selectTarget = document.getElementById('year');
                    dataTarget = listYear;
                    break;
                case "item2":
                    defaultTarget = 'กรุณาเลือกรายละเอียดรุ่น';
                    selectTarget = document.getElementById('item2');
                    dataTarget = listItem2;
                    break;
            }
            selectTarget.options.length = 0;
            selectTarget.options[selectTarget.options.length] = new Option(defaultTarget, '');
            for (var i = 0; i < dataTarget.length; i++) {
                if(pointer == 'group' && dataTarget[i].group == position || position == 'all') {
                    selectTarget.options[selectTarget.options.length] = new Option(dataTarget[i].name, dataTarget[i].id);  
                } else if(pointer == 'id' && dataTarget[i].id == position || position == 'all') {
                    selectTarget.options[selectTarget.options.length] = new Option(dataTarget[i].name, dataTarget[i].id);  
                }
            }
        }

        function searchIndex(target, value) {
            switch (target) {
                case "category":
                    dataTarget = listCate;
                    break;
                case "family":
                    dataTarget = listFamily;
                    break;
                case "item":
                    dataTarget = listItem;
                    break;
                case "year":
                    dataTarget = listYear;
                    break;
                case "item2":
                    dataTarget = listItem2;
                    break;
            }
            for (var i = 0; i < dataTarget.length; i++) {
                if(dataTarget[i].id == value) {
                    return i + 1;
                }
            }
        }

        function selectList(target, value) {
            document.getElementById(target).selectedIndex = searchIndex(target, value);
        }

        function loadOption(target) {
            switch (target) {
                case "category":
                    pevEle = '';
                    break;
                case "family":
                    pevEle = 'category';
                    break;
                case "item":
                    pevEle = 'family';
                    break;
                case "year":
                    pevEle = 'item';
                    break;
                case "item2":
                    pevEle = 'year';
                    break;
            }
            selectOption(target, document.getElementById(pevEle).value, 'group');
        }

       function defaultBox() {
            selectOption('category', 'all', 'group');
            <?php if (isset($category) && $category != '') { ?>
                selectList('category', '<?php echo $category; ?>');
            <?php } ?>

            <?php if (isset($family) && $family != '') { ?>
                selectOption('family', 'all', 'group');
                selectList('family', '<?php echo $family; ?>');
            <?php } else if(isset($category) && $category != '') { ?>
                loadOption('family');
            <?php } else { ?>
                selectOption('family', 'none', 'group');
            <?php } ?>

            <?php if (isset($item) && $item != '') { ?>
                selectOption('item', 'all', 'group');
                selectList('item', '<?php echo $item; ?>');
            <?php } else if(isset($family) && $family != '') { ?>
                loadOption('item');
            <?php } else { ?>
                selectOption('item', 'none', 'group');
            <?php } ?> 

            <?php if (isset($year) && $year != '') { ?>
                selectOption('year', 'all', 'group');
                selectList('year', '<?php echo $year; ?>');
            <?php } else if(isset($item) && $item != '') { ?>
                loadOption('year');
            <?php } else { ?>
                selectOption('year', 'none', 'group');
            <?php } ?> 

            <?php if (isset($item2) && $item2 != '') { ?>
                selectOption('item2', 'all', 'group');
                selectList('item2', '<?php echo $item2; ?>');
            <?php } else if(isset($year) && $year != '') { ?>
                loadOption('item2');
            <?php } else { ?>
                selectOption('item2', 'none', 'group');
            <?php } ?>
        };
        $(window).on('load', function() {
            defaultBox();
        });
        
</script> -->