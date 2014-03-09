<?php

/* 
*	Filename
*	GlobClass.php
*
*	Description:
*	Provides an interface to build your glob() pattern and filters aswell including different flags easially.
*
*
*	Author:
*	Marcus Schumann AKA Tanax
*
*	Creation date:
*	March 23rd -10
*
*	Version:
*	1.0
*/

class GlobClass
{
	
	/*
	*	Holds the flags we've included.
	*/
	private $flags = array ( );
	
	/*
	*	An array of the allowed flags
	*/
	private $allowedFlags = array (
	
		GLOB_MARK,
		GLOB_NOSORT,
		GLOB_NOCHECK,
		GLOB_NOESCAPE,
		GLOB_BRACE,
		GLOB_ONLYDIR,
		GLOB_ERR
		
	);
	
	/*
	*	Holds the pattern to the folder(s) we want to search
	*/
	private $patterns = array ( );
	
	/*
	*	Holds the filters we've included
	*/
	private $filters = array ( );
	
	/*
	*	Holds the current warning level
	*/
	private $warnlevel = 0;
	
	
	/*
	*	addPattern
	*
	*	Add a pattern of the folder(s) we want to search
	*
	*	
	*	Arguments: $pattern
	*	Return	 : GlobClass $this
	*/
	public function addPattern ( $pattern )
	{
		
		$this->patterns[] = $pattern;
		return $this;
		
	}
	
	/*
	*	addPatterns
	*
	*	Lets you include several patterns at the same time
	*
	*	
	*	Arguments: unlimited
	*	Return	 : GlobClass $this
	*/
	public function addPatterns ( )
	{
		
		for ( $i = 0; $i < func_num_args ( ); $i++ )
		{
			
			$this->addPattern( func_get_arg ( $i ) );
			
		}
		
		return $this;
		
	}
	
	/*
	*	addFilter
	*
	*	Adds a filter that we want to include in our search
	*
	*	
	*	Arguments: $filter
	*	Return	 : GlobClass $this
	*/
	public function addFilter ( $filter )
	{
		
		$this->filters[] = $filter;
		return $this;
		
	}
	
	/*
	*	addFilters
	*
	*	Lets you include several filters at the same time
	*
	*	
	*	Arguments: unlimited
	*	Return	 : GlobClass $this
	*/
	public function addFilters ( )
	{
		
		for ( $i = 0; $i < func_num_args ( ); $i++ )
		{
			
			$this->addFilter( func_get_arg ( $i ) );
			
		}
		
		return $this;
		
	}
	
	/*
	*	addFlag
	*
	*	Adds a flag that we want to include in our search
	*
	*	
	*	Arguments: $flag
	*	Return	 : GlobClass $this
	*/
	public function addFlag ( $flag )
	{
		
		if ( in_array ( $flag, $this->allowedFlags ) && !in_array ( $flag, $this->flags ) )
		{
			
			$this->flags[] = $flag;
			
		}
		
		else if ( !in_array ( $flag, $this->flags ) )
		{
			
			$this->warnlevel++;
			
		}
		
		return $this;
		
	}
	
	/*
	*	addFlags
	*
	*	Lets you include several flags at the same time
	*
	*	
	*	Arguments: unlimited
	*	Return	 : GlobClass $this
	*/
	public function addFlags ( )
	{
		
		for ( $i = 0; $i < func_num_args ( ); $i++ )
		{
			
			$this->addFlag( func_get_arg ( $i ) );
			
		}
		
		return $this;
		
	}
	
	/*
	*	getFiles
	*
	*	Builds the glob() by calling internal private methods thus getting the glob() pattern, filters and flags
	*
	*	
	*	Arguments: void
	*	Return	 : array()
	*/
	public function getFiles ( )
	{
		
		if ( $this->warnlevel > 0 )
		{
			
			$this->unsetValues( );
			return array ( "Cannot complete request because too high warnlevel. Please check that the flags you added exists and haven't been added already." );
			
		}
		
		else
		{
			
			$flags = $this->getFlags( );
			$search = $this->getSearch( );
			
			echo "The search is currently: " . $search;
			echo "<br />";
			
			if ( $flags != '' )
			{
				
				$this->unsetValues( );
				return glob ( ( $search ), $flags );
				
			}
			
			$this->unsetValues( );
			return glob ( ( $search ) );
			
		}
		
	}
	
	/*
	*	unsetValues
	*
	*	Unsets all internal values
	*
	*	
	*	Arguments: void
	*	Return	 : void
	*/
	private function unsetValues ( )
	{
		
		unset($this->patterns);
		unset($this->filters);
		unset($this->flags);
		$this->warnlevel = 0;
		
	}
	
	/*
	*	getSearch
	*
	*	Builds the pattern consisting of the path and the filters
	*
	*	
	*	Arguments: void
	*	Return	 : array()
	*/
	private function getSearch ( )
	{
		
		$search = '';
		
		foreach($this->patterns as $pattern)
		{
			
			if($search != '')
			{
				
				$search .= ',';
				
			}
			
			$search .= $pattern . $this->getFilters( );
			
		}
		
		return ($search != '' && count ( $this->patterns ) > 1 ) ? '{' . $search . '}' : $search;
		
	}
	
	/*
	*	getFlags
	*
	*	Gets the flags that we've included. If several was included a delimiter of "|" gets added between each flag
	*
	*	
	*	Arguments: void
	*	Return	 : String $flags
	*/
	private function getFlags ( )
	{
		
		$flags = '';
		
		foreach ( $this->flags as $flag )
		{
			
			if ( $flags != '' )
			{
				
				$flags .= ' | ';
				
			}
			
			$flags .= $flag;
			
		}
		
		return $flags;
		
	}
	
	/*
	*	getFilters
	*
	*	Gets the filters that we've included. If several was included a delimiter of "," gets added between each filter and the final
	*	String of filters gets encapsulated between {}
	*
	*	
	*	Arguments: void
	*	Return	 : String $filters
	*/
	private function getFilters ( )
	{
		
		$filters = '';
		$i = 0;
		
		if ( count ( $this->filters ) > 1 )
		{
			
			$filters .= '{';
			
		}
		
		foreach ( $this->filters as $filter )
		{
			
			if ( $i > 0 )
			{
				
				$filters .= ',';
				
			}
			
			$filters .= $filter;
			$i++;
			
		}
		
		if ( count ( $this->filters ) > 1 )
		{
			
			$filters .= '}';
			
		}
		
		if ( $filters == '' && count ( $this->filters ) == 0 )
		{
			
			return '*';
			
		}
		
		return $filters;
		
	}
	
}