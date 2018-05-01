$.mobile.document
	.on("listviewcreate", function (e) {
        
        var input,
	    listbox = $(".filter-menu-listbox"),
	        form = listbox.jqmData("filter-form"),
	        listview = $(e.target);

	    if (!form) {
            listbox = $("<ul class='.filter-menu-listbox'></ul>");
	        input = $("<input data-type='search'></input>");
	        form = $("<form></form>").append(input);

	        input.textinput();

	        listbox
	            .prepend(form)
	            .jqmData("filter-form", form);
            
            listview.prepend(listbox);
	    }

	    listview.filterable({
	        input: input
	    });
	})


$('.filter-menu').on('change', function () {
            $('.filter-menu').find('option').prop('disabled', false);

           $('.filter-menu').each(function () {
               $('.filter-menu').not(this).find('option[value="' + this.value + '"]').prop('disabled', true);
            });

            // rebuild select menus
            $('select').selectmenu('refresh', true);
        });