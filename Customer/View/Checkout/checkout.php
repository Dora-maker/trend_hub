<?php
session_start();
if (!isset($_SESSION["currentLoginUser"])) {
	header("Location: ../Error/error.php");
} else {
	include "../../Controller/regionAndTownshipController.php";
	include "../../Controller/checkout/getUserInfoController.php";
	$name = $customerInfo[0]["c_name"];
	$phone = $customerInfo[0]["c_phone"];
	$email = $customerInfo[0]["c_email"];
	if (!isset($_SESSION["saveDeliveryAddress"])) {
		$region = $customerInfo[0]["region_id"];
		$township = $customerInfo[0]["township_id"];
		$address = $customerInfo[0]["c_address"];
		$deliFee = $deliFee[0]["delivery_fee"];
	} else {
		$region = $_SESSION["regionChangeCheckout"];
		$township = $_SESSION["townshipChangeCheckout"];
		$address = $_SESSION["addressChangeCheckout"];
		$townshipLists = $_SESSION["checkoutTownshipList"];
		$deliFee = $_SESSION["checkoutDeliFee"];
	}

	$subTotal = (isset($_SESSION["subTotal"])) ? $_SESSION["subTotal"] : false;
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Check Out</title>
	<link rel="icon" href="../resources/img/header/headerLogo.svg" type="image/icon type">

	<link rel="stylesheet" href="../resources/lib/tailwind/output.css?id=<?= time() ?>">
	<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

	<script src="../resources/lib/jquery3.6.0.js"></script>
	<script src="../resources/js/checkout/checkout.js" defer></script>
	<script src="../resources/js/checkout/regionTownshipCheck.js" defer></script>
</head>
<?php
include "../resources/common/navbar.php";
$primaryColor = isset($editInfo[0]["primary_color"]) && !empty($editInfo[0]["primary_color"]) ? $editInfo[0]["primary_color"] : '#FAFAFA';
$tertiaryColor = isset($editInfo[0]["tertiary_color"]) && !empty($editInfo[0]["tertiary_color"]) ? $editInfo[0]["tertiary_color"] : '#F36823';
$startTime = isset($editInfo[0]["h1_color"]) && !empty($editInfo[0]["h1_color"]) ? $editInfo[0]["h1_color"] : '00:00';
$endTime = isset($editInfo[0]["h2_color"]) && !empty($editInfo[0]["h2_color"]) ? $editInfo[0]["h2_color"] : '00:00';
$cardColor = isset($editInfo[0]["price_card_color"]) && !empty($editInfo[0]["price_card_color"]) ? $editInfo[0]["price_card_color"] : '#ffffff';
$buttonColor = isset($editInfo[0]["buy_button_color"]) && !empty($editInfo[0]["buy_button_color"]) ? $editInfo[0]["buy_button_color"] : '#F36823';
$priceColor = isset($editInfo[0]["price_text_color"]) && !empty($editInfo[0]["price_text_color"]) ? $editInfo[0]["price_text_color"] : '#F36823';
$titleColor = isset($editText[0]["title_color"]) && !empty($editText[0]["title_color"]) ? $editText[0]["title_color"] : '#000000';
date_default_timezone_set('Asia/Yangon');
$currentHour = date('H:i');
?>

<style>
	.scrollHide::-webkit-scrollbar {
		display: none;
	}
</style>

<body class="scrollHide bg-[<?php
							if ($startTime > $endTime) {
								if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
									echo "#000000";
								} else {
									echo $primaryColor;
								}
							} else {
								if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
									echo "#000000";
								} else {
									echo $primaryColor;
								}
							}
							?>] font-roboto">

	<p class="px-5 mt-36 md:mt-28 md:px-10 md:pt-8 font-bold text-xl text-[<?php
																			if ($startTime > $endTime) {
																				if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
																					echo "#ffffff";
																				} else {
																					echo $tertiaryColor;
																				}
																			} else {
																				if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
																					echo "#ffffff";
																				} else {
																					echo $tertiaryColor;
																				}
																			}
																			?>]">Delivery Information</p>
	<div class="md:p-10">
		<!--start of container -->
		<div class="bg-[<?php
						if ($startTime > $endTime) {
							if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
								echo "#3d3d3d";
							} else {
								echo $primaryColor;
							}
						} else {
							if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
								echo "#3d3d3d";
							} else {
								echo $primaryColor;
							}
						}
						?>] shadow-md">
			<!-- start of delivery information and order summary container -->
			<div class="md:p-1">
				<!-- start of delivery information container -->
				<form action="../Payment/payment.php" method="post" class="md:px-10 py-4 px-4 md:flex md:justify-between ">
					<div class="md:space-y-5">
						<div>
							<h2 class="md:text-xl font-semibold text-[<?php
																		if ($startTime > $endTime) {
																			if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
																				echo "#ffffff";
																			} else {
																				echo $titleColor;
																			}
																		} else {
																			if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
																				echo "#ffffff";
																			} else {
																				echo $titleColor;
																			}
																		}
																		?>]">Contact Information</h2>
							<p class="md:mt-1 mt-2 text-[<?php
															if ($startTime > $endTime) {
																if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
																	echo "#ffffff";
																} else {
																	echo "#757575";
																}
															} else {
																if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
																	echo "#ffffff";
																} else {
																	echo "#757575";
																}
															}
															?>]">Check your delivery information carefully before proceeding.</p>

							<div class="md:mt-6 mt-4">
								<div>
									<label for="name" class="block font-medium text-[<?php
																						if ($startTime > $endTime) {
																							if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
																								echo "#ffffff";
																							} else {
																								echo $navColor;
																							}
																						} else {
																							if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
																								echo "#ffffff";
																							} else {
																								echo $navColor;
																							}
																						}
																						?>] ">Name</label>
									<div class="mt-2">
										<input type="text" name="deliverName" class="border border-1 p-2 border-[<?php
																													if ($startTime > $endTime) {
																														if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
																															echo "#000000";
																														} else {
																															echo $buttonColor;
																														}
																													} else {
																														if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
																															echo "#000000";
																														} else {
																															echo $buttonColor;
																														}
																													}
																													?>] w-full rounded-md bg-slate-200 bg-opacity-50 outline-none py-1.5 placeholder:text-gray-400" value="<?= $name ?>" readonly>
									</div>
								</div>

								<div class="mt-3">
									<label for="phone" class="block font-medium text-[<?php
																						if ($startTime > $endTime) {
																							if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
																								echo "#ffffff";
																							} else {
																								echo $navColor;
																							}
																						} else {
																							if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
																								echo "#ffffff";
																							} else {
																								echo $navColor;
																							}
																						}
																						?>]">Phone Number</label>
									<div class="mt-2">
										<input type="text" name="deliverPhone" class="border border-1 p-2 border-[<?php
																													if ($startTime > $endTime) {
																														if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
																															echo "#000000";
																														} else {
																															echo $buttonColor;
																														}
																													} else {
																														if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
																															echo "#000000";
																														} else {
																															echo $buttonColor;
																														}
																													}
																													?>] w-full rounded-md bg-slate-200 bg-opacity-50 outline-none py-1.5 placeholder:text-gray-400" value="<?= $phone ?>" readonly>
									</div>
								</div>

								<div class="mt-3">
									<label for="region" class="block font-medium text-[<?php
																						if ($startTime > $endTime) {
																							if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
																								echo "#ffffff";
																							} else {
																								echo $navColor;
																							}
																						} else {
																							if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
																								echo "#ffffff";
																							} else {
																								echo $navColor;
																							}
																						}
																						?>]">Region</label>
									<div class="mt-2">
										<select id="deliRegion" name="deliverRegion" class="border border-1 p-2 border-[<?php
																														if ($startTime > $endTime) {
																															if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
																																echo "#000000";
																															} else {
																																echo $buttonColor;
																															}
																														} else {
																															if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
																																echo "#000000";
																															} else {
																																echo $buttonColor;
																															}
																														}
																														?>] w-full rounded-md outline-none py-1.5 placeholder:text-gray-400">
											<?php
											foreach ($totalRegions as $regionLoop) { ?>
												<option value="<?= $regionLoop["id"] ?>" <?php
																							if (($regionLoop["id"] == $region)) { ?> selected <?php }
																																				?>><?= $regionLoop["name"] ?></option>
											<?php }
											?>
										</select>
									</div>
								</div>
								<div class="mt-3">
									<label for="township" class="block font-medium text-[<?php
																							if ($startTime > $endTime) {
																								if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
																									echo "#ffffff";
																								} else {
																									echo $navColor;
																								}
																							} else {
																								if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
																									echo "#ffffff";
																								} else {
																									echo $navColor;
																								}
																							}
																							?>]">Township</label>
									<div class="mt-2">
										<select id="deliTownship" name="deliverTownship" class="border border-1 p-2 border-[<?php
																															if ($startTime > $endTime) {
																																if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
																																	echo "#000000";
																																} else {
																																	echo $buttonColor;
																																}
																															} else {
																																if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
																																	echo "#000000";
																																} else {
																																	echo $buttonColor;
																																}
																															}
																															?>] w-full rounded-md outline-none py-1.5 placeholder:text-gray-400">
											<?php
											foreach ($townshipLists as $townshipLoop) { ?>
												<option value="<?= $townshipLoop["id"] ?>" <?php if (($townshipLoop["id"] == $township)) { ?> selected <?php } ?>>
													<?= $townshipLoop["name"] ?>
												</option>
											<?php }
											?>
										</select>
									</div>
								</div>

								<div class="mt-3">
									<label for="address" class="block font-medium text-[<?php
																						if ($startTime > $endTime) {
																							if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
																								echo "#ffffff";
																							} else {
																								echo $navColor;
																							}
																						} else {
																							if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
																								echo "#ffffff";
																							} else {
																								echo $navColor;
																							}
																						}
																						?>]">Address</label>
									<div class="mt-2">
										<input id="deliAddress" type="text" name="deliverAddress" class="border border-1 p-2 border-[<?php
																																		if ($startTime > $endTime) {
																																			if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
																																				echo "#000000";
																																			} else {
																																				echo $buttonColor;
																																			}
																																		} else {
																																			if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
																																				echo "#000000";
																																			} else {
																																				echo $buttonColor;
																																			}
																																		}
																																		?>] w-full rounded-md outline-none py-1.5 placeholder:text-gray-400" value="<?= $address ?>">
									</div>
								</div>
							</div>
						</div>
						<div class="flex items-center justify-center mt-4 md:mt-0">
							<button type="button" id="saveDeliInfoBtn" class="rounded-md bg-[<?php
																								if ($startTime > $endTime) {
																									if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
																										echo "#000000";
																									} else {
																										echo $buttonColor;
																									}
																								} else {
																									if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
																										echo "#000000";
																									} else {
																										echo $buttonColor;
																									}
																								}
																								?>] md:px-6 py-2 px-10 font-semibold text-white">Save and Deliver Here</button>
						</div>
					</div>

					<!-- end of delivery information container -->
					<!-- start of order summary container -->
					<div class="md:w-[30%]">
						<!-- start of order summary card -->
						<div class="p-4 m-5 bg-[<?php
												if ($startTime > $endTime) {
													if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
														echo "#4f4f4f";
													} else {
														echo $secondaryColor;
													}
												} else {
													if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
														echo "#4f4f4f";
													} else {
														echo $secondaryColor;
													}
												}
												?>] text-lg">
							<p class="hidden font-medium mb-5 text-lg md:block text-[<?php
																						if ($startTime > $endTime) {
																							if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
																								echo "#ffffff";
																							} else {
																								echo $navColor;
																							}
																						} else {
																							if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
																								echo "#ffffff";
																							} else {
																								echo $navColor;
																							}
																						}
																						?>]">Order Summary</p>
							<!-- start of prices -->
							<div class="flex justify-between items-center mb-5 text-[<?php
																						if ($startTime > $endTime) {
																							if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
																								echo "#ffffff";
																							} else {
																								echo $navColor;
																							}
																						} else {
																							if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
																								echo "#ffffff";
																							} else {
																								echo $navColor;
																							}
																						}
																						?>]">
								<div>
									<p class="mb-3">Sub-total</p>
									<p>Delivery</p>
								</div>
								<div class="text-right">
									<p class="mb-3"><?= ($subTotal) ?></p>
									<p id="deliFee"><?= $deliFee ?> Ks</p>
									<input id="hiddenDeliFee" type="hidden" name="deliFee" value="<?= $deliFee ?>">
								</div>
							</div>
							<hr class="border border-dashed border-gray-400">
							<div class="flex justify-between items-center mt-5 text-[<?php
																						if ($startTime > $endTime) {
																							if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
																								echo "#ffffff";
																							} else {
																								echo $navColor;
																							}
																						} else {
																							if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
																								echo "#ffffff";
																							} else {
																								echo $navColor;
																							}
																						}
																						?>]">
								<p>Grand Total</p>
								<?php
								$amountString = preg_replace("/[^0-9]/", "", $subTotal);

								// Convert the result to an integer
								$amountInteger = (int)$amountString;
								$grandTotal = $amountInteger + $deliFee;
								?>
								<p id="grandTotal"><?= number_format($grandTotal) ?> Ks</p>
								<input id="hiddenGrandTotal" type="hidden" name="grandTotal" value="<?= $grandTotal ?>">
							</div>
							<!-- end of prices -->
							<div class="flex justify-center mt-6 mb-4">
								<button type="submit" name="checkout" id="placeOrderBtn" class="bg-[<?php
																					if ($startTime > $endTime) {
																						if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
																							echo "#000000";
																						} else {
																							echo $buttonColor;
																						}
																					} else {
																						if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
																							echo "#000000";
																						} else {
																							echo $buttonColor;
																						}
																					}
																					?>] bg-opacity-50 rounded-md px-8 py-2 text-[<?php
																																		if ($startTime > $endTime) {
																																			if (strtotime($currentHour) >= strtotime($startTime) || strtotime($currentHour) < strtotime($endTime)) {
																																				echo "#ffffff";
																																			} else {
																																				echo $buttonText;
																																			}
																																		} else {
																																			if (strtotime($currentHour) >= strtotime($startTime) && strtotime($currentHour) < strtotime($endTime)) {
																																				echo "#ffffff";
																																			} else {
																																				echo $buttonText;
																																			}
																																		}
																																		?>]">
									Place Order
								</button>
							</div>
						</div>
						<!-- end of order summary card -->
					</div>
				</form>
				<!-- end of order summary container -->
			</div>
			<!-- end of delivery information and order summary container -->
		</div>
		<!--end of card container -->
	</div>
</body>

</html>
<?php
include "../resources/common/footer.php";
?>