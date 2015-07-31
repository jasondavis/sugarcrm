({
    extendsFrom: 'RecordView',

    initialize: function (options) {
        app.view.invokeParent(this, {type: 'view', name: 'record', method: 'initialize', args:[options]});
        //добавляем объект, что бы можно было к нему обращаться из консоли
        SL_RequestBean = this;
    }
})
