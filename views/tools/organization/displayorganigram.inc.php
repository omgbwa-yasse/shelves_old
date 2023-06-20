
<?php
    // Connect to the database
    $db = new mysqli("localhost", "root", "", "dbms");
?><?php
    // Query the data from the classification table
    $result = $db->query("SELECT * FROM classification");

    // Create an array to store the nodes
    $nodes = array();

    // Create a node for each row in the table
    while ($row = $result->fetch_assoc()) {
        // Create a ShapeNode for this row
        $node = new MindFusion.Diagramming.ShapeNode(diagram);
        $node.setBounds(new Rect(0, 0, 30, 15));
        $node.setText($row["classification_title"]);
        diagram.addItem(node);

        // Store the node in the array using the classification_id as the key
        $nodes[$row["classification_id"]] = $node;
    }

    // Create links between the nodes based on the classification_parent_id
    $result->data_seek(0);
    while ($row = $result->fetch_assoc()) {
        if ($row["classification_parent_id"] != null) {
            // Get the origin and destination nodes
            $fromNode = $nodes[$row["classification_parent_id"]];
            $toNode = $nodes[$row["classification_id"]];

            // Create a link between the nodes
            $link = new MindFusion.Diagramming.DiagramLink(diagram, fromNode, toNode);
            diagram.addItem(link);
        }
    }
?>
    
 <h1> organigrammme  </h1></center> 
    <div >
			<canvas id="diagramCanvas" width="2100" height="2100">
            
			</canvas>
		</div>
		
		<div >
			<canvas id="zoomer" width="50" height="300">
			</canvas>
	</div>
		
	</div>
	
<script src="models/tools/organization/script/MindFusion.Common.js" type="text/javascript"></script>
<script src="models/tools/organization/script/MindFusion.Diagramming.js" type="text/javascript"></script>
<script src="models/tools/organization/organigram.js" type="text/javascript"></script>
</body>
</html>
