({
    extendsFrom: 'RecordView',

    initialize: function (options) {
        app.view.invokeParent(this, {type: 'view', name: 'record', method: 'initialize', args:[options]});
        //добавляем объект, что бы можно было к нему обращаться из консоли
        SL_RequestBean = this;
        
        
        if(!window.SL_Beans) SL_Beans = {};
		var SL_Bean = jQuery.extend(true, {}, this);
		SL_Beans[this.options.module] = SL_Bean;
    }
})

App.drawer.open({
                layout:'create',
                context:{
                    module:'SL_Requests',model:SL_Beans.SL_Requests.model
                }
            }
            
        );
