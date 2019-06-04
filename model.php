<?php

// include everything in models
foreach (glob("models/*.php") as $filename)
{
	include $filename;
}