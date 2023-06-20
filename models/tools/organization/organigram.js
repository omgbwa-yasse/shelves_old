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



document.addEventListener("DOMContentLoaded", function ()
{
	//some random names for the people
	names = ["Nicole Montgomery", "Loren Alvarado", "Vicki Fisher", "Edith Fernandez", "Lynette Sullivan", "Amy Rhodes", "Teresa Marsh", "Ginger Larson", "Bob Lawrence", "Arthur Ball", "Ramiro Mitchell", "Mitchell Barker", "Jane Silva", "Diana Curry", "Jay Smith", "Caroline Garcia", "Paulette Wells", "Alexander Chapman", "Emanuel Glover", "Shannon Daniel", "Jesus Townsend", "Lowell Gibbs", "Ruben Figueroa", "Estelle Henderson", "Sonja French", "Ken Underwood", "Joe Hines", "Eric Rogers", "Lindsay Manning", "Jorge Shelton", "Bobby Sanders", "Mamie Pratt", "Rudolph Armstrong", "Wayne Mcguire", "Jessica Peters", "Clinton Maxwell", "Lillian Carroll", "Felipe Craig", "Marion Holt", "Willard Reynolds", "Anita Adkins", "Ramona Hanson", "Zachary Rodriguez", "Boyd Todd", "Michelle Ford", "Orlando Jenkins", "Nelson Benson", "Shirley Farmer", "Eddie Curtis", "Phil Taylor", "Yolanda Strickland", "Simon Abbott", "Jesus Neal", "Roman Owens", "Heather Hogan", "Andrew Jennings", "Lucille Kelly", "Glenda Lee", "Kathryn Boone", "Craig Summers", "Michele Fernandez", "Tonya Parsons", "Bennie Freeman", "Stewart Austin", "Johanna Barber", "Julia Dean", "Jeanette Hernandez", "Nicholas Hawkins", "Miriam Lindsey", "Chester Waters", "Marta Jackson", "Jake Brown", "Rufus Turner", "Melvin Nunez", "Luther Collier", "Geraldine Barton", "Wesley Lamb", "Wilbur Frazier", "Wendell Saunders", "Brittany Corte"];
	
	// create a Diagram component that wraps the "diagram" canvas
	diagram = Diagram.create(document.getElementById("diagramCanvas"));
	
		// enable drawing of custom nodes interactively
	diagram.setCustomNodeType(DeanNode);
	diagram.setBehavior(Behavior.Custom);
	
	var theme = new Theme();
	var linkStyle = new Style();
	linkStyle.setStroke("#CECECE");
	theme.styles["std:DiagramLink"] = linkStyle;
	diagram.setTheme(theme);	
	diagram.setShadowsStyle(MindFusion.Diagramming.ShadowsStyle.None);
	
	createNodes();
	
	var links = diagram.getLinks();
	
	//set all links to light gray and with pointers at the bottom, 
	//rather than the head in order to appear inverted
	for(var i = 0; i < links.length; i++)
	{
		var link = links[i];
		
	link.setBaseShape("Triangle");
	link.setHeadShape(null);
	link.setBaseShapeSize(3.0);
	link.setBaseBrush({ type: 'SolidBrush', color: "#CECECE" });
	link.setZIndex(0);
	}
	
	//create an instance of the Tree Layout and apply it
	var layout = new TreeLayout();
	layout.direction = MindFusion.Graphs.LayoutDirection.TopToBottom;
	layout.linkType = MindFusion.Graphs.TreeLayoutLinkType.Cascading;
	//enabling assistants tells the layout to order the nodes with Assistant traits in a special way
	layout.enableAssistants = true;
    diagram.arrange(layout);
	
	diagram.resizeToFitItems(5);
	
		// create an ZoomControl component that wraps the "zoomer" canvas
	var zoomer = MindFusion.Controls.ZoomControl.create(document.getElementById("zoomer"));
	zoomer.setTarget(diagram);
	zoomer.setZoomFactor(55);	
	
	
});

document.addEventListener("DOMContentLoaded", function ()
{
	//some random names for the people
	names = ["Nicole Montgomery", "Loren Alvarado", "Vicki Fisher", "Edith Fernandez", "Lynette Sullivan", "Amy Rhodes", "Teresa Marsh", "Ginger Larson", "Bob Lawrence", "Arthur Ball", "Ramiro Mitchell", "Mitchell Barker", "Jane Silva", "Diana Curry", "Jay Smith", "Caroline Garcia", "Paulette Wells", "Alexander Chapman", "Emanuel Glover", "Shannon Daniel", "Jesus Townsend", "Lowell Gibbs", "Ruben Figueroa", "Estelle Henderson", "Sonja French", "Ken Underwood", "Joe Hines", "Eric Rogers", "Lindsay Manning", "Jorge Shelton", "Bobby Sanders", "Mamie Pratt", "Rudolph Armstrong", "Wayne Mcguire", "Jessica Peters", "Clinton Maxwell", "Lillian Carroll", "Felipe Craig", "Marion Holt", "Willard Reynolds", "Anita Adkins", "Ramona Hanson", "Zachary Rodriguez", "Boyd Todd", "Michelle Ford", "Orlando Jenkins", "Nelson Benson", "Shirley Farmer", "Eddie Curtis", "Phil Taylor", "Yolanda Strickland", "Simon Abbott", "Jesus Neal", "Roman Owens", "Heather Hogan", "Andrew Jennings", "Lucille Kelly", "Glenda Lee", "Kathryn Boone", "Craig Summers", "Michele Fernandez", "Tonya Parsons", "Bennie Freeman", "Stewart Austin", "Johanna Barber", "Julia Dean", "Jeanette Hernandez", "Nicholas Hawkins", "Miriam Lindsey", "Chester Waters", "Marta Jackson", "Jake Brown", "Rufus Turner", "Melvin Nunez", "Luther Collier", "Geraldine Barton", "Wesley Lamb", "Wilbur Frazier", "Wendell Saunders", "Brittany Corte"];
	
	// create a Diagram component that wraps the "diagram" canvas
	diagram = Diagram.create(document.getElementById("diagramCanvas"));
	
		// enable drawing of custom nodes interactively
	diagram.setCustomNodeType(DeanNode);
	diagram.setBehavior(Behavior.Custom);
	
	var theme = new Theme();
	var linkStyle = new Style();
	linkStyle.setStroke("#CECECE");
	theme.styles["std:DiagramLink"] = linkStyle;
	diagram.setTheme(theme);	
	diagram.setShadowsStyle(MindFusion.Diagramming.ShadowsStyle.None);
	
	createNodes();
	
	var links = diagram.getLinks();
	
	//set all links to light gray and with pointers at the bottom, 
	//rather than the head in order to appear inverted
	for(var i = 0; i < links.length; i++)
	{
		var link = links[i];
		
	link.setBaseShape("Triangle");
	link.setHeadShape(null);
	link.setBaseShapeSize(3.0);
	link.setBaseBrush({ type: 'SolidBrush', color: "#CECECE" });
	link.setZIndex(0);
	}
	
	//create an instance of the Tree Layout and apply it
	var layout = new TreeLayout();
	layout.direction = MindFusion.Graphs.LayoutDirection.TopToBottom;
	layout.linkType = MindFusion.Graphs.TreeLayoutLinkType.Cascading;
	//enabling assistants tells the layout to order the nodes with Assistant traits in a special way
	layout.enableAssistants = true;
    diagram.arrange(layout);
	
	diagram.resizeToFitItems(5);
	
		// create an ZoomControl component that wraps the "zoomer" canvas
	var zoomer = MindFusion.Controls.ZoomControl.create(document.getElementById("zoomer"));
	zoomer.setTarget(diagram);
	zoomer.setZoomFactor(55);	
	
	
});
