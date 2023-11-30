<?php

namespace Mr4Lc\LaravelEmailAuditLog\Models;

use Illuminate\Database\Eloquent\Model;

class EmailAudit extends Model {

    protected $guarded = [];
    protected $table = 'email_audit_log';

}
