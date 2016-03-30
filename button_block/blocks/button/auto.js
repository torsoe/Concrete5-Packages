/*var fncOpenModal = function(title){
		return $("#addNewDialog").dialog({
			title: (title ? title : ''),
			width: '500',
			height: '500',
			modal: true,
			buttons: [{
					class: 'btn btn-hover-danger btn-default pull-left',
					click: function() {
						$(this).dialog('close');
					},
					text: 'Cancel'
				},{
					class: 'pull-right btn btn-primary',
					click: function() {
						$(this).dialog('close');
					},
					text: 'Übernehmen'
				}
			]
		});
	},
	fncAddNewAttribute = function(){
		console.log(this)
	},
	selectFromSitemap = function(){
		$.fn.dialog.open({
			width: '90%',
			height: '70%',
			modal: false,
			title: ccmi18n_sitemap.choosePage,
			href: CCM_TOOLS_PATH + '/sitemap_search_selector'
		});	
		ConcreteEvent.unsubscribe('SitemapSelectPage');
		ConcreteEvent.subscribe('SitemapSelectPage', function(e, data){
			jQuery.fn.dialog.closeTop();

			if(data.cID){
				getCollectionDataFromCID(data.cID)
			}
		});
	},
	getCollectionDataFromCID = function(cID){
		$.ajax({
			url: blockSrc,
			data: { cID: cID}
		}).done(function(e,data) {
			console.log(e,data)
		});
	};





*/