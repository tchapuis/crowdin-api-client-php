<?php

namespace CrowdinApiClient\Api;

use CrowdinApiClient\Model\DownloadFile;
use CrowdinApiClient\Model\Report;

/**
 * Class ReportApi
 * @package Crowdin\Api
 */
class ReportApi extends AbstractApi
{
    /**
     * Generate Report
     * @link https://support.crowdin.com/api/v2/#operation/api.projects.reports.post API Documentation
     * @link https://support.crowdin.com/enterprise/api/#operation/api.projects.reports.post API Documentation Enterprise
     *
     * @param int $projectId
     * @param array $data
     * @return Report|null
     */
    public function generate(int $projectId, array $data): ?Report
    {
        $path = sprintf('projects/%s/reports', $projectId);
        return $this->_post($path, Report::class, $data);
    }

    /**
     * Check Report Generation Status
     * @link https://support.crowdin.com/api/v2/#operation/api.projects.reports.get API Documentation
     * @link https://support.crowdin.com/enterprise/api/#operation/api.projects.reports.get API Documentation Enterprise
     *
     * @param int $projectId
     * @param string $reportId
     * @return Report|null
     */
    public function get(int $projectId, string $reportId): ?Report
    {
        $path = sprintf('projects/%d/reports/%s', $projectId, $reportId);
        return $this->_get($path, Report::class);
    }

    /**
     * Download Report
     * @link https://support.crowdin.com/api/v2/#operation/api.projects.reports.download.get API Documentation
     * @link https://support.crowdin.com/enterprise/api/#operation/api.projects.reports.download.get API Documentation Enterprise
     *
     * @param int $projectId
     * @param string $reportId
     * @return DownloadFile|null
     */
    public function download(int $projectId, string $reportId): ?DownloadFile
    {
        $path = sprintf('projects/%d/reports/%s/download', $projectId, $reportId);
        return $this->_get($path, DownloadFile::class);
    }
}
