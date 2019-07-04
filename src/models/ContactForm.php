<?php

namespace Faerie\Models;

use Faerie\Models;

final class ContactForm extends Model
{
    protected static $table = 'contact_form';
    protected static $pk = 'id';
    protected static $hasCreateTimestamp = true;
}

