<?php
use Faerie\Models\ContactForm;

require_once getcwd() . '/vendor/autoload.php';

$result = ContactForm::where('name', 'Mary Diaz');

