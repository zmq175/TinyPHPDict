<?php 
function is_chinese($str)
{
if(preg_match('/[\x7f-\xff]/',$str))
{
return true;
}
else
{
return false;
}
}
?>