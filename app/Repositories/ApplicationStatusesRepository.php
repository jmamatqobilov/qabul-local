<?php

namespace App\Repositories;

use App\Models\ApplicationStatus;

class ApplicationStatusesRepository extends Repository {

	public function __construct(ApplicationStatus $applicationStatus) {
		$this->model = $applicationStatus;
	}
}
?>
