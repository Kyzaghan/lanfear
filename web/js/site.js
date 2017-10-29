function LoadAsyncPartials() {
    $(".partialCallBack").each(function (o, t) { var e = $(t).data("url"); e && e.length > 0 && $(t).load(e) })
}