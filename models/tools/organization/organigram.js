var Diagram = MindFusion.Diagramming.Diagram;
var CompositeNode = MindFusion.Diagramming.CompositeNode;
var Behavior = MindFusion.Diagramming.Behavior;
var Events = MindFusion.Diagramming.Events;
var Theme = MindFusion.Diagramming.Theme;
var Style = MindFusion.Diagramming.Style;

var Alignment = MindFusion.Drawing.Alignment;
var Rect = MindFusion.Drawing.Rect;
var Point = MindFusion.Drawing.Point;

var TreeLayout = MindFusion.Graphs.TreeLayout;

var diagram = null;
var names;
var coloredNode;

var DeanNode = CompositeNode.classFromTemplate("DeanNode",
{
	component: "SimplePanel",
	name: "root",
	children:
	[
        {
            component: "Rect",
			name: "Background",
			brush: "white",
			pen: "#cecece",
		},
		{
			component: "GridPanel",
			rowDefinitions: ["*", "2"],
			columnDefinitions: ["*"],
			children:
			[	
				{		
					component: "StackPanel",
					orientation: "Vertical",
					margin: "1",
					verticalAlignment: "Near",
					gridRow: 0,
					children:
						[
							{
								component: "Text",
								name: "Faculty",
								autoProperty: true,
								text: "title",
								font: "serif bold"
								},
								{
								component: "Text",
								name: "Dean",
								autoProperty: true,
								text: "Name of dean",
								pen: "#808080",
								padding: "1,0,1,0"
								},
								{
								component: "Text",
								name: "Details",
								autoProperty: true,
								text: "details",
								font: "serif 3.5 italic"
								}		
						
						]
				},
				
				{
					component: "Rect",
					name: "Underline",
					pen: "red",
					brush: "red",
					gridRow: 1,
					autoProperty: true					
				}
			]
		}			
	]
});


