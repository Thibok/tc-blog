<?php

/*
 * This file is part of the Tc-blog project.
 *
 * (c) Thibault Cavailles <tcblog@tc-dev.ovh>
 *
 * First blog in PHP
 */

namespace Components;

class Pagination
{
	/**
	 * 
	 * @var int
	 * @access private
	 */
	private $actualPage;

	/**
	 * 
	 * @var int
	 * @access private
	 */
	private $nextPage;

	/**
	 * 
	 * @var int
	 * @access private
	 */
	private $previousPage;

	/**
	 * 
	 * @var int
	 * @access private
	 */
	private $totalPerPage;

	/**
	 * 
	 * @var int
	 * @access private
	 */
	private $total;

	/**
	 * 
	 * @var int
	 * @access private
	 */
	private $totalPage;

	/**
	 * @access public
	 * @param int $total
	 * @param int $totalPerPage
	 * @param int $actualPage
	 */
	public function __construct($total, $totalPerPage, $actualPage = 1)
	{
		$this->setTotal($total);
		$this->setTotalPerPage($totalPerPage);
		$this->setActualPage($actualPage);
	}

	/**
	 * @access public
	 * @return bool
	 */
	public function canPrevious()
	{
		return $this->actualPage > 1 && $this->actualPage <= $this->totalPage;
	}

	/**
	 * @access public
	 * @return bool
	 */
	public function canNext()
	{
		return $this->actualPage < $this->totalPage;
	}

	/**
	 * Set pagination and return $start for $manager method
	 * @access public
	 * @return int
	 */
	public function makePagination()
	{
		$this->previousPage = $this->actualPage - 1;
		$this->nextPage = $this->actualPage + 1;

		$totalPage = $this->total / $this->totalPerPage;
		$this->totalPage = ceil($totalPage);

		$start = $this->actualPage * $this->totalPerPage - $this->totalPerPage;

		return $start;
	}

	/**
	 * @access public
	 * @param int $total
	 * @return void
	 */
	public function setTotal($total)
	{
		$this->total = (int) $total;
	}

	/**
	 * @access public
	 * @param int $totalPerPage
	 * @return void
	 */
	public function setTotalPerPage($totalPerPage)
	{
		$this->totalPerPage = (int) $totalPerPage;
	}

	/**
	 * @access public
	 * @param int $actualPage
	 * @return void
	 */
	public function setActualPage($actualPage)
	{
        $this->actualPage = (int) $actualPage;
	}

	/**
	 * @access public
	 * @return int
	 */
	public function getTotalPage()
	{
		return $this->totalPage;
	}

	/**
	 * @access public
	 * @return int
	 */
	public function getNextPage()
	{
		return $this->nextPage;
	}

	/**
	 * @access public
	 * @return int
	 */
	public function getPreviousPage()
	{
		return $this->previousPage;
	}	

	/**
	 * @access public
	 * @return int
	 */
	public function getActualPage()
	{
		return $this->actualPage;
	}

	/**
	 * @access public
	 * @return int
	 */
	public function getTotal()
	{
		return $this->total;
	}
}