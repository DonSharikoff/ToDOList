'use strict';

class ToDo {

    static render(data) {
        $('tbody').children().not('.clear').remove();
        for (let item in data) {

            let obj = data[item];

            $('#empty').before(
                "<tr id='" + obj.id + "'>" +
                "<td><div class='checkbox " + obj.status + "'></div></td>" +
                "<td class='text'><div class='inner_text'>" + obj.text + "</div><span></span></td>" +
                "</tr>"
            );
        }
    }

    view() {
        $.ajax({
            method: "GET",
            url: "/php/ajax.php",
            dataType: 'JSON',
            data: {action: 'view'},
            success: (function (data) {
                ToDo.render(data)
            }),
        })
    }

    add(val) {
        $.ajax({
            method: "GET",
            url: "/php/ajax.php",
            dataType: 'JSON',
            data: {action: 'add', text: val},
            success: (function (data) {
                ToDo.render(data)
            }),
        })
    }

    del(id) {
        $.ajax({
            method: "GET",
            url: "/php/ajax.php",
            dataType: 'JSON',
            data: {action: 'delete', id: id},
            success: (function (data) {
                ToDo.render(data)
            }),
        })
    }

    update(change) {
        $.ajax({
            method: "GET",
            url: "/php/ajax.php",
            dataType: 'JSON',
            data: {action: 'update', change: change},
            success: (function (data) {
                ToDo.render(data)
            }),
        })
    }
}

$(window).on('load', function () {
    var todo = new ToDo();
    todo.view();
    $('tbody').on('click', 'span',function() {
        let id = $(this).parents('tr').attr('id');
        todo.del(id)
    }).on('click', '.add',function() {
        $(this).removeClass().toggleClass('ok');
        $('.add_text').empty()
            .after(
                "<input class='add_text_input' placeholder='What is new?' type='text'>"
            );
        $('.add_text_input').focus();
    }).on('click', '.ok',function() {
        todo.add($('.add_text_input').val());
        $('.ad_tr').remove();
        $('#empty').after(
            "<tr class='ad_tr clear'>" +
            "<td><div class=\"add\"></div></td>" +
            "<td><div class=\"add_text\">Add new task...</div></td>" +
            "</tr>"
        );
    }).on('click', '.checkbox',function() {
        let o = {};
        o.id = $(this).parents('tr').attr('id');
        o.status = $(this).attr('class').split(' ')[1];
        todo.update(o);
    }).on('click', '.inner_text',function() {
        $(this).parents().siblings().children('.checkbox').removeClass().toggleClass('ok_text');
        $(this).parent('tr').toggleClass('clear');
        let text = $(this).text();
        $(this).empty()
            .append(
                "<input class='text_input' type='text'>"
            );
        $('.text_input').focus().val(text);
    }).on('click', '.ok_text',function() {
        let o = {};
        o.id = $(this).parents('tr').attr('id');
        o.text = $('.text_input').val();
        todo.update(o);
        $(this).parents('tr').remove();
    })
});