$('#do_change').click(function () {
    var url = location.href;
    var pg = $('#jp_page').val();
    var fronString = url.substring(0, url.indexOf('?'));
    if (fronString.length < 1)
    {
        fronString = url;
    }
    var paraString = url.substring(url.indexOf('?') + 1, url.length).split('&');
    var paraObj = {};
    for (i = 0; j = paraString[i]; i++)
    {
        paraObj[j.substring(0, j.indexOf('=')).toLowerCase()] = j.substring(j.indexOf('=') + 1, j.length);
    }

    paraObj['p'] = pg;
    var out = '';
    for (var strs in paraObj)
    {
        if (strs.length > 0)
        {
            out += '&' + strs + '=' + paraObj[strs];
        }
    }
    out = out.substring(1, out.length);
    out = fronString + '?' + out;
    window.location.href = out;
});
