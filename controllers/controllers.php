<?php

interface IControllers
{
	public function top();

	public function footer();

	public function content($var);
}