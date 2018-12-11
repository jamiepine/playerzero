<div class="innertube">
	
	


<div id="versionnotes">

<h1>playerZero AI (alpha)</h1>

<h2>TO DO LIST</h2>
<ul>
	<li>CURRENTLY DOING: Adding users table, ability to log current topic for user (IP), better topic detection</li>

</ul>



<h2>Alpha 1.0</h2>
<p>Release Date: 29/09/2017</p>

<ul>
	<li>Added database table: <b>zero_topics</b> - Fields: ID, Name, isHuman, dateCreated, dateModified</li>
	<li>Added <b>Topic detection</b> searches database for <b>keyword</b> stores to variable  <a href="#">$isTopic</a></li>
	<li>Added <b>Question detection</b> <a href="#">$isQuestion</a> for sentences starting certain words:</li>
		<ul>
			<li>Detects phrases: <a>array("what", "what's", "when", "where", "why", "how", "is", "do", "are", "who", "will", "which");</a></li>
		</ul>
	<li>Added database table: <b>dictionary</b> - 176,023 records added</li>
	<li>Fixed some random bugs with locating layouts, theme partials, etc.</li>
</ul>



</div>


	
</div>