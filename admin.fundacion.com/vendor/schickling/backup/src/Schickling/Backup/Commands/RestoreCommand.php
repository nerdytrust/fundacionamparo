<?php namespace Schickling\Backup\Commands;

use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Finder\Finder;
use File;

class RestoreCommand extends BaseCommand
{
	protected $name = 'db:restore';
	protected $description = 'Restore a dump from `app/storage/dumps`';
	protected $database;

	public function fire()
	{		
		$this->database = $this->getDatabase($this->input->getOption('database'));

		$fileName = $this->argument('dump');
		
		if ($fileName)
		{
			$this->restoreDump($fileName);
		}
		else
		{
			$this->listAllDumps();
		}
	}

	protected function restoreDump($fileName)
	{
		$sourceFile = $this->getDumpsPath() . $fileName;

		if ($this->isCompressed($sourceFile))
			$sourceFile = $this->uncompress($sourceFile);

		$status = $this->database->restore($this->getUncompressedFileName($sourceFile));
		
		if ($this->isCompressed($sourceFile))
			$this->uncompressCleanup($this->getUncompressedFileName($sourceFile));

		if ($status === true)
		{
			$this->line(sprintf($this->colors->getColoredString("\n".'%s was successfully restored.'."\n",'green'), $fileName));
		}
		else
		{
			$this->line($this->colors->getColoredString("\n".'Database restore failed.'."\n",'red'));
		}
	}

	protected function listAllDumps()
	{
		$finder = new Finder();
		$finder->files()->in($this->getDumpsPath());

		if ($finder->count() > 0)
		{
			$this->line($this->colors->getColoredString("\n".'Please select one of the following dumps:'."\n",'white'));

			$finder->sortByName();
			$count = count($finder);
			$i=0;
			foreach ($finder as $dump)
			{
				$i++;
				if($i!=$count)
				{
					$this->line($this->colors->getColoredString($dump->getFilename(),'brown'));
				}
				else
				{
					$this->line($this->colors->getColoredString($dump->getFilename()."\n",'brown'));
				}
			}
		}
		else
		{
			$this->line($this->colors->getColoredString("\n".'You haven\'t saved any dumps.'."\n",'brown'));
		}
	}

	/** 
	 * Uncompress a GZip compressed file
	 * 
	 * @param string $fileName      Relative or absolute path to file
	 * @return string               Name of uncompressed file (without .gz extension)
	 */ 
	protected function uncompress($fileName)
	{
		$fileNameUncompressed = $this->getUncompressedFileName($fileName);
		$command = sprintf('gzip -dc %s > %s', $fileName, $fileNameUncompressed);
		if ($this->console->run($command) !== true)
			$this->line($this->colors->getColoredString("\n".'Uncompress of gzipped file failed.'."\n",'red'));

		return $fileNameUncompressed;
	}

	/**
	 * Remove uncompressed files 
	 * 
	 * Files are temporarily uncompressed for usage in restore. We do not need these copies
	 * permanently.
	 * 
	 * @param string $fileName      Relative or absolute path to file
	 * @return boolean              Success or failure of cleanup
	 */ 
	protected function cleanup($fileName)
	{
		$status = true;
		$fileNameUncompressed = $this->getUncompressedFileName($fileName);
		if ($fileName !== $fileNameUncompressed)
			$status = File::delete($fileName);

		return $status;
	}

	/**
	 * Retrieve filename without Gzip extension
	 * 
	 * @param string $fileName      Relative or absolute path to file
	 * @return string               Filename without .gz extension
	 */ 
	protected function getUncompressedFileName($fileName)
	{
		return preg_replace('"\.gz$"', '', $fileName);
	}

	protected function getArguments()
	{
		return array(
			array('dump', InputArgument::OPTIONAL, 'Filename of the dump')
		);
	}

	protected function getOptions()
	{
		return array(
			array('database', null, InputOption::VALUE_OPTIONAL, 'The database connection to restore to'),
		);
	}
}
