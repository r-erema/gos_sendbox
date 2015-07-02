Doodles.grid.Doodles = function(config) {
    config = config || {};
    Ext.apply(config, {
        id : 'doodles-grid-doodles',
        url : Doodles.config.connectorUrl,
        baseParams: {action : 'mgr/doodle/getList'},
        fields: ['id', 'name', 'description', 'menu'],
        paging : true,
        remoteSort : true,
        anchor : '97%',
        autoExpandColumn : 'name',
        columns : [
            {
                header : _('id'),
                dataIndex : 'id',
                sortable : true,
                width: 60
            },
            {
                header : _('doodles.name'),
                dataIndex : 'name',
                sortable : true,
                width : 100,
                editor : {
                    xtype : 'textfield'
                }
            },
            {
                header : _('doodles.description'),
                dataIndex : 'description',
                sortable : false,
                width : 350,
                editor : {xtype : 'textfield'}
            }
        ],
        tbar : [
            {
                xtype : 'textfield',
                id : 'doodles-search-filter',
                emptyText : _('doodles.search...'),
                listeners : {
                    'change' : {
                        fn : this.search,
                        scope : this
                    },
                    'render' : {
                        fn : function (cmp) {
                            new Ext.KeyMap(cmp.getEl(), {
                                key : Ext.EventObject.ENTER,
                                fn : function () {
                                    this.fireEvent('change', this);
                                    this.blur();
                                    return true;
                                },
                                scope : cmp
                            })
                        }
                    },
                    scope : this
                }
            }
        ]
    });
    Doodles.grid.Doodles.superclass.constructor.call(this, config);
};

Ext.extend(Doodles.grid.Doodles,MODx.grid.Grid, {
    search : function(tf , nv, ov) {
        var s = this.getStore();
        s.baseParams.query = tf.getValue();
        this.getBottomToolbar().changePage(1);
        this.refresh();
    }
});
Ext.reg('doodles-grid-doodles',Doodles.grid.Doodles);