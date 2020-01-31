//////////////////////////////////////////////////////////////////
// Add Blockquote button
//////////////////////////////////////////////////////////////////
(function() {  
    tinymce.create('tinymce.plugins.blockquote', {  
        init : function(ed, url) {  
            ed.addButton('blockquote', {  
                title : 'Add a quote',  
                image : url+'/testimonial-icon.png',  
                onclick : function() {  
                     ed.selection.setContent('[blockquote class="e.g. relationship, marketing, technology, accounting, support" author="- Author name here"]Text here[/blockquote]');  
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('blockquote', tinymce.plugins.blockquote);  
})();


//////////////////////////////////////////////////////////////////
// Add Toggle button
//////////////////////////////////////////////////////////////////
(function() {  
    tinymce.create('tinymce.plugins.toggle', {  
        init : function(ed, url) {  
            ed.addButton('toggle', {  
                title : 'Add a toggle area',  
                image : url+'/button-toggle.png',  
                onclick : function() {  
                     ed.selection.setContent('[toggle title="Title Here"]Content inside the toggle box here[/toggle]');  
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('toggle', tinymce.plugins.toggle);  
})();



//////////////////////////////////////////////////////////////////
// Add Button button
//////////////////////////////////////////////////////////////////
(function() {  
    tinymce.create('tinymce.plugins.button', {  
        init : function(ed, url) {  
            ed.addButton('button', {  
                title : 'Add a button',  
                image : url+'/button-button.png',  
                onclick : function() {  
                     ed.selection.setContent('[button link=""]Text here[/button]');  
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('button', tinymce.plugins.button);  
})();



//////////////////////////////////////////////////////////////////
// Add Box button
//////////////////////////////////////////////////////////////////
(function() {  
    tinymce.create('tinymce.plugins.box', {  
        init : function(ed, url) {  
            ed.addButton('box', {  
                title : 'Add a box',  
                image : url+'/button-dropcap.png',  
                onclick : function() {  
                     ed.selection.setContent('[box link="" title="" class="e.g. relationship, marketing, technology, accounting, support"]Text here[/box]');  
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('box', tinymce.plugins.box);  
})();


//////////////////////////////////////////////////////////////////
// Add Columns button
//////////////////////////////////////////////////////////////////
(function() {  
    tinymce.create('tinymce.plugins.columns', {  
        init : function(ed, url) {  
            ed.addButton('columns', {  
                title : 'Add a column',  
                image : url+'/content-boxes.png',  
                onclick : function() {  
                     ed.selection.setContent('[column grid="2" span="1"]Some content[/column]');  
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('columns', tinymce.plugins.columns);  
})();




//////////////////////////////////////////////////////////////////
// Add Team button
//////////////////////////////////////////////////////////////////
(function() {  
    tinymce.create('tinymce.plugins.team', {  
        init : function(ed, url) {  
            ed.addButton('team', {  
                title : 'Display Team Members',  
                image : url+'/person-button.png',  
                onclick : function() {  
                     ed.selection.setContent('[team][/team]');  
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('team', tinymce.plugins.team);  
})();
