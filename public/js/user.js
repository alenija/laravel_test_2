var UsersPage = function () {
    var that = this;

    this.table = $('#users');

    this.setUsersData = function (usersData) {
        that.usersData = usersData;

        return that;
    };

    this.init = function () {
        that.drawUsersTable();
    };

    this.refreshTable = function () {
        that.table.draw();
    };

    this.drawUsersTable = function() {
        that.table = that.table.DataTable({
            lengthMenu: [25],
            "data": that.usersData,
            responsive: true,
            // stateSave: true,
            bInfo : false,
            "dom": '<"filters-for-tables"Bf>rtip',
            language: {
                search: "",
                searchPlaceholder: "Search",
                lengthMenu: "_MENU_",
                paginate: {
                    next: '<i class="fa fa-caret-right"></i>',
                    previous: '<i class="fa fa-caret-left"></i>'
                }
            },
            processing: false,
            paging: true,
            searching: true,
            info: false,
            select: true,
            // "deferRender": true,
            "order": [[ 0, 'desc' ]],
            "columns": [
                { "data": "id", responsivePriority: 1 },
                { "data": "name", responsivePriority: 2},
                { "data": "email", responsivePriority: 3},
                { "data": "password", "orderData": 9},
                { "data": "remember_token",  responsivePriority: 6},
                { "data": "created_at", responsivePriority: 5},
                { "data": "updated_at",  responsivePriority: 7}
            ],
            "fnDrawCallback": function (data) {

                /* load detais for device */
                $('tbody tr').mousedown(function(event) {
                    var data = that.table.row( $(this) ).data();
                    switch (event.which) {
                        case 1:
                            //window.location = (data.url);
                            break;
                        case 2:
                            window.open(data.url);
                            break;
                        default:
                            break;
                    }
                });
                $('.grid-layout__table .filters-for-tables').append($('.grid-layout__filter-list > .filters-for-tables'));
            }
        });

        /* search */
        var searchInput = $('div.dataTables_filter input');
    };

    $(document).ready(function() {
        that.init();
    });
};