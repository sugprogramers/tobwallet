//Year method
function years(tags, startY, endY)
{

		if(tags == '')
		//If the years('') paramenter is empty, add no tags
		{
			var years = "";
			for (i = startY; i < endY + 1;  i++ )
			{
				years += i;
			}
		}
		else
		//If the years('option') has paramenter, add the tags to it
		{
			var years = "";
			for (i = startY; i < endY + 1;  i++ )
			{
				years += "<" + tags +">" + i +"</" + tags +">";
			}	
		}
		
	//You can call the class multiple times						
    var multiple_list = document.getElementsByClassName("bear-years");
    for (i = 0; i < multiple_list.length; i++)
	{
    	multiple_list[i].innerHTML = years;
    }	
}