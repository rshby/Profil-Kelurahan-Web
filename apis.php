<?php 
class apis extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('frontend');

		$this->frontend->insertPengunjung();
		$this->_theme = 'frontend/themes/dlh';
	}


	function getPOI($kelurahan="")
	{

		$kelurahan = urldecode($kelurahan);

		$curl = curl_init();

		curl_setopt_array($curl, array(
				CURLOPT_URL => "https://layananupik.jogjakota.go.id/lumen/public/api/filter-poi-category",
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => "",
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 0,
				CURLOPT_FOLLOWLOCATION => true,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => "POST",
				CURLOPT_POSTFIELDS =>"{\n  \"type\": \"string\",\n  \"default\": \"{\\\"kategori\\\":\\\"Kantor Polisi\\\"}\"\n}",
				CURLOPT_HTTPHEADER => array(
						"Content-Type: application/json; charset=utf-8",
						"User-Agent: PostmanRuntime/7.22.0",
						"Accept: */*",
						"Cache-Control: no-cache",
						"Host: layananupik.jogjakota.go.id",
						"Accept-Encoding: gzip, deflate, br",
						"Content-Length: 71",
						"Connection: keep-alive"
				),
		));

		$response = json_decode(curl_exec($curl), true);

		$err = curl_error($curl);
		$errno = curl_errno($curl);

		curl_close($curl);

		if ($errno) {
			$result = array(
							"status" => false,
							"msg" => $err,
							"data" => null
						);
		} else {

			/* Get Wilayah */
			foreach ($response["data"] as $key => $value) {
				$wilayah = $this->getwil_bycoordinate($value["lng"], $value["lat"]);
				if (empty($kelurahan) || (strtoupper(str_replace(" ", "", trim($wilayah["desa"]))) == strtoupper(str_replace(" ", "", trim($kelurahan))))) {
					$response["data"][$key] = array_merge($response["data"][$key], $wilayah);
				} else {
					unset($response["data"][$key]);
				}
			}

			$result = array(
							"status" => true,
							"msg" => "Data ditemukan.",
							"data" => $response
						);
		}

		/*echo "Kelurahan :";
		dump($kelurahan);
		echo "Response :";
		dump($response);
		echo "Error :";
		dump($err);
		echo "Err Code :";
		dump($errno);*/

		return $result;

	}


	function getRTHP($kelurahan="")
	{

		$kelurahan = urldecode($kelurahan);

		$curl = curl_init();

		curl_setopt_array($curl, array(
		  	CURLOPT_URL => "https://peta.jogjakota.go.id/apis/geojson/coordinate_rhtp/ts",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_CUSTOMREQUEST => "POST",
	      	CURLOPT_SSL_VERIFYPEER => false
		));

		$response = json_decode(curl_exec($curl), true);

		$err = curl_error($curl);
		$errno = curl_errno($curl);

		curl_close($curl);

		if ($errno) {
			$result = array(
							"status" => false,
							"msg" => $err,
							"data" => null
						);
		} else {

			foreach ($response["features"] as $key => $value) {

				$coordinate = $response["features"][$key]["geometry"];

				if (!empty($coordinate) && is_array($coordinate)) {
					//$response["features"][$key]["properties"] = array_merge($response["features"][$key]["properties"], $this->getwil_bycoordinate($coordinate["coordinates"][0], $coordinate["coordinates"][1]));
					$wilayah = $this->getwil_bycoordinate($coordinate["coordinates"][0], $coordinate["coordinates"][1]);
					if (empty($kelurahan) || (strtoupper(str_replace(" ", "", trim($wilayah["desa"]))) == strtoupper(str_replace(" ", "", trim($kelurahan))))) {
						$response["features"][$key]["properties"] = array_merge($response["features"][$key]["properties"], $wilayah);
					} else {
						unset($response["features"][$key]);
					}
				} else {
					unset($response["features"][$key]);
				}
				
			}

			$result = array(
							"status" => true,
							"msg" => "Data ditemukan.",
							"data" => $this->getProperties_fromgeojson($response)
						);
		}
		
		/*echo "Kelurahan :";
		dump($kelurahan);
		echo "Response :";
		dump($response);
		echo "Error :";
		dump($err);
		echo "Err Code :";
		dump($errno);
		echo "Result :";
		dump($result);*/

		return $result;

	}


	function getPJU($kelurahan="")
	{

		$kelurahan = urldecode($kelurahan);

		$curl = curl_init();

		curl_setopt_array($curl, array(
		  	CURLOPT_URL => "https://peta.jogjakota.go.id/apis/geojson/coordinate_pju/ts",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_CUSTOMREQUEST => "POST",
	      	CURLOPT_SSL_VERIFYPEER => false
		));

		$response = json_decode(curl_exec($curl), true);

		$err = curl_error($curl);
		$errno = curl_errno($curl);

		curl_close($curl);

		if ($errno) {
			$result = array(
							"status" => false,
							"msg" => $err,
							"data" => null
						);
		} else {

			foreach ($response["features"] as $key => $value) {

				$coordinate = $response["features"][$key]["geometry"];

				if (!empty($coordinate) && is_array($coordinate)) {
					//$response["features"][$key]["properties"] = array_merge($response["features"][$key]["properties"], $this->getwil_bycoordinate($coordinate["coordinates"][0], $coordinate["coordinates"][1]));
					$wilayah = $this->getwil_bycoordinate($coordinate["coordinates"][0], $coordinate["coordinates"][1]);
					if (empty($kelurahan) || (strtoupper(str_replace(" ", "", trim($wilayah["desa"]))) == strtoupper(str_replace(" ", "", trim($kelurahan))))) {
						$response["features"][$key]["properties"] = array_merge($response["features"][$key]["properties"], $wilayah);
					} else {
						unset($response["features"][$key]);
					}
				} else {
					unset($response["features"][$key]);
				}
				
			}

			$result = array(
							"status" => true,
							"msg" => "Data ditemukan.",
							"data" => $this->getProperties_fromgeojson($response)
						);
		}
		
		/*echo "Kelurahan :";
		dump($kelurahan);
		echo "Response :";
		dump($response);
		echo "Error :";
		dump($err);
		echo "Err Code :";
		dump($errno);
		echo "Result :";
		dump($result);*/

		return $result;

	}


	function getFreehotspot($kelurahan="")
	{

		$kelurahan = urldecode($kelurahan);

		$curl = curl_init();

		curl_setopt_array($curl, array(
		  	CURLOPT_URL => "https://peta.jogjakota.go.id/apis/geojson/coordinate_freehotspot/ts",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_CUSTOMREQUEST => "POST",
	      	CURLOPT_SSL_VERIFYPEER => false
		));

		$response = json_decode(curl_exec($curl), true);

		$err = curl_error($curl);
		$errno = curl_errno($curl);

		curl_close($curl);

		if ($errno) {
			$result = array(
							"status" => false,
							"msg" => $err,
							"data" => null
						);
		} else {

			foreach ($response["features"] as $key => $value) {

				$coordinate = $response["features"][$key]["geometry"];

				if (!empty($coordinate) && is_array($coordinate)) {
					//$response["features"][$key]["properties"] = array_merge($response["features"][$key]["properties"], $this->getwil_bycoordinate($coordinate["coordinates"][0], $coordinate["coordinates"][1]));
					$wilayah = $this->getwil_bycoordinate($coordinate["coordinates"][0], $coordinate["coordinates"][1]);
					if (empty($kelurahan) || (strtoupper(str_replace(" ", "", trim($wilayah["desa"]))) == strtoupper(str_replace(" ", "", trim($kelurahan))))) {
						$response["features"][$key]["properties"] = array_merge($response["features"][$key]["properties"], $wilayah);
					} else {
						unset($response["features"][$key]);
					}
				} else {
					unset($response["features"][$key]);
				}
				
			}

			$result = array(
							"status" => true,
							"msg" => "Data ditemukan.",
							"data" => $this->getProperties_fromgeojson($response)
						);
		}
		
		echo "Kelurahan :";
		dump($kelurahan);
		echo "Response :";
		dump($response);
		echo "Error :";
		dump($err);
		echo "Err Code :";
		dump($errno);
		echo "Result :";
		dump($result);

		//return $result;

	}


	function getwil_bycoordinate($longitude="", $latitude="")
	{

		$curl = curl_init();

		curl_setopt_array($curl, array(
		  	CURLOPT_URL => "https://peta.jogjakota.go.id/apis/getwil",
		  	CURLOPT_RETURNTRANSFER => true,
		  	CURLOPT_CUSTOMREQUEST => "POST",
      	  	CURLOPT_SSL_VERIFYPEER => false,
      	  	CURLOPT_SSL_VERIFYHOST => false,
      	  	CURLOPT_POST => 1,
	      	CURLOPT_POSTFIELDS => "longitude=".$longitude."&latitude=".$latitude,
		));

		$response = json_decode(curl_exec($curl), true);

		$err = curl_error($curl);
		$errno = curl_errno($curl);

		curl_close($curl);

		if ($errno) {
			/*$result = array(
							"status" => false,
							"msg" => $err,
							"data" => null
						);*/
			return "";
		} else {
			/*$result = array(
							"status" => true,
							"msg" => "Data ditemukan.",
							"data" => $response
						);*/
			return $response;
		}

		/*echo "OK";
		echo "<br>";
		echo "Response :";
		dump($response);
		echo "Error :";
		dump($err);
		echo "Err Code :";
		dump($errno);*/

	}


	function getProperties_fromgeojson($geojson='')
	{
		if (!empty($geojson) && is_array($geojson)) {
			foreach ($geojson["features"] as $key => $value) {
				$result[] = $value["properties"];
			}
		} else {
			$result = null;
		}
		return $result;
	}


}
?>