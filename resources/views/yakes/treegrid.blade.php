    <!DOCTYPE html>
    <html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Dynamic Loading in TreeGrid - jQuery EasyUI Demo</title>
        <link rel="stylesheet" type="text/css" href="https://www.jeasyui.com/easyui/themes/default/easyui.css">
        <link rel="stylesheet" type="text/css" href="https://www.jeasyui.com/easyui/themes/icon.css">
        <script type="text/javascript" src="https://www.jeasyui.com/easyui/jquery.min.js"></script>
        <script type="text/javascript" src="https://www.jeasyui.com/easyui/jquery.easyui.min.js"></script>
    </head>
    <body>
        <h2>Dynamic Loading in TreeGrid</h2>
        <p>Click the node expand button to load its child nodes.</p>
        
        <table title="Products" class="easyui-treegrid" style="width:700px;height:300px"
                url="{{ asset('treegrid_data.json') }}"
                rownumbers="true"
                idField="id" treeField="name">
            <thead>
                <tr>
                    <th field="name" width="250">Name</th>
                    <th field="quantity" width="100" align="right">Quantity</th>
                    <th field="price" width="150" align="right" formatter="formatDollar">Price</th>
                    <th field="total" width="150" align="right" formatter="formatDollar">Total</th>
                </tr>
            </thead>
        </table>
        <script>
            function formatDollar(value){
                if (value){
                    return '$'+value;
                } else {
                    return '';
                }
            }
        </script>
    </body>
    </html>