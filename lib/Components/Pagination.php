<?php
namespace Components;

class Pagination
{
	private $actualPage;
	private $nextPage;
	private $previousPage;
	private $totalPerPage;
	private $total;
	private $totalPage;

	public function __construct($total, $totalPerPage, $actualPage = 1)
	{
		$this->setTotal($total);
		$this->setTotalPerPage($totalPerPage);
		$this->setActualPage($actualPage);
	}

	public function canPrevious()
	{
		return $this->actualPage > 1 && $this->actualPage <= $this->totalPage;
	}

	public function canNext()
	{
		return $this->actualPage < $this->totalPage;
	}

	public function makePagination()
	{
		$this->previousPage = $this->actualPage - 1;
		$this->nextPage = $this->actualPage + 1;

		$totalPage = $this->total / $this->totalPerPage;
		$this->totalPage = ceil($totalPage);

		$start = $this->actualPage * $this->totalPerPage - $this->totalPerPage;

		return $start;
	}

	public function setTotal($total)
	{
		$this->total = (int) $total;
	}

	public function setTotalPerPage($totalPerPage)
	{
		$this->totalPerPage = (int) $totalPerPage;
	}

	public function setActualPage($actualPage)
	{
        $this->actualPage = (int) $actualPage;
	}

	public function getTotalPage()
	{
		return $this->totalPage;
	}

	public function getNextPage()
	{
		return $this->nextPage;
	}

	public function getPreviousPage()
	{
		return $this->previousPage;
	}	

	public function getActualPage()
	{
		return $this->actualPage;
	}

	public function getTotal()
	{
		return $this->total;
	}
}