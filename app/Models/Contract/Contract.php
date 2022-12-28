<?php

namespace App\Models\Contract;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    protected $table = 'contract';
    use HasFactory;

    public $timestamps = false;

    protected $dates = [
        'contract_start_datetime',
        'contract_end_datetime',
        'contract_end_actual_datetime',
    ];
    protected $fillable =  [
        'id_driver',
        'contract_number',
        'contract_start_datetime',
        'contract_end_datetime',
        'contract_end_actual_datetime',
        'contract_type',
        'contract_status',
        'company_name',
        'company_commerical_register',
        'company_vat_register',
        'company_id_number',
        'company_license_number',
        'company_license_category',
        'company_phone',
        'company_address',
        'company_fax',
        'company_email',
        'tenant_name_ar',
        'tenant_address',
        'tenant_brith_date',
        'tenant_nationality',
        'tenant_id_type',
        'tenant_id_number',
        'tenant_id_date_expire',
        'tenant_id_version_number',
        'tenant_place_issue',
        'tenant_mobile',
        'tenant_license_type',
        'tenant_license_date_expire',
        'tenant_license_number',
        'tenant_signature',
        'car_type',
        'car_plate_number',
        'car_manufacture_year',
        'car_color',
        'car_registerion_type',
        'car_operating_card_number',
        'car_operating_card_number_date_expire',
        'car_fuel_type',
        'car_amount_fuel_present',
        'car_appointment_maintenanc_date',
        'car_insurance_policy_number',
        'car_insurance_policy_number_date_expire',
        'car_insurance_type',
        'car_lessee_signature',
        'lease_term',
        'lease_cost_dar_hour',
        'lease_extra_km_cost',
        'lease_hours_delay_count',
        'lease_hours_delay_allowed',
        'lease_km_free_day_hour',
        'lease_return_car_another_city',
        'lease_lessee_signature',
        'car_receipt_odometer_reading_at_exit',
        'car_receipt_lessee_signature',
        'car_return_odometer_reading_at_entery',
        'car_return_lessee_signature',
        'leasing_policy_return_car_before_contract_expire',
        'leasing_policy_contract_extension',
        'leasing_policy_lessee_signature',
        'car_technical_condition_at_lease_air_condition',
        'car_technical_condition_at_return_air_condition',
        'car_technical_condition_at_lease_radio_recorder',
        'car_technical_condition_at_return_radio_recorder',
        'car_technical_condition_at_lease_interior_screen',
        'car_technical_condition_at_return_interior_screen',
        'car_technical_condition_at_lease_speedometer',
        'car_technical_condition_at_return_speedometer',
        'car_technical_condition_at_lease_interior_upholstery',
        'car_technical_condition_at_return_interior_upholstery',
        'car_technical_condition_at_lease_spare_cover_equipment',
        'car_technical_condition_at_return_spare_cover_equipment',
        'car_technical_condition_at_lease_wheel',
        'car_technical_condition_at_return_wheel',
        'car_technical_condition_at_lease_spare_wheel',
        'car_technical_condition_at_return_spare_wheel',
        'car_technical_condition_at_lease_first_aid_kit',
        'car_technical_condition_at_return_first_aid_kit',
        'car_technical_condition_at_lease_oil_change_time',
        'car_technical_condition_at_return_oil_change_time',
        'car_technical_condition_at_lease_key',
        'car_technical_condition_at_return_key',
        'car_technical_condition_at_lease_fire_extinguisher_availability',
        'car_technical_condition_at_return_fire_extinguisher_availability',
        'car_technical_condition_at_lease_availability_triangle_refactor',
        'car_technical_condition_at_return_availability_triangle_refactor',
        'car_technical_condition_at_lease_other',
        'car_technical_condition_at_return_other',
        'car_technical_condition_at_lease_notes',
        'car_technical_condition_at_return_notes',
        'car_technical_condition_at_lease_lessor_signature',
        'car_technical_condition_at_return_lessor_signature',
        'car_technical_condition_at_lease_lessee_signature',
        'car_technical_condition_at_return_lessee_signature',
        'car_technical_condition_at_lease_printer',
        'car_technical_condition_at_return_printer',
        'car_technical_condition_at_lease_point_sale_device',
        'car_technical_condition_at_return_point_sale_device',
        'car_technical_condition_at_lease_fornt_screen',
        'car_technical_condition_at_return_fornt_screen',
        'car_technical_condition_at_lease_internal_camera',
        'car_technical_condition_at_return_internal_camera',
        'car_technical_condition_at_lease_4sensor_seat',
        'car_technical_condition_at_return_4sensor_seat',
        'car_technical_condition_at_lease_button_emergency',
        'car_technical_condition_at_return_button_emergency',
        'car_technical_condition_at_lease_device_tracking',
        'car_technical_condition_at_return_device_tracking',
        'car_technical_condition_at_lease_light_taxi_mark',
        'car_technical_condition_at_return_light_taxi_mark',
        'main_financial_additional_serivce_cost',
        'main_financial_international_authorization_cost',
        'main_financial_cost_returning_carin_another_city',
        'main_financial_discount',
        'main_financial_vat',
        'main_financial_paid',
        'main_financial_payment_method',
        'main_financial_total_lease_cost_day_hour',
        'main_financial_additional_driver_authorization_value',
        'main_financial_total_driver_fare',
        'main_financial_total_delay_cost',
        'main_financial_total',
        'main_financial_cost_travelling_out_city',
        'main_financial_remaining_amount',
        'other_financial_deductible_amount_value',
        'other_financial_spare_parts_cost',
        'other_financial_car_damage_assessment_value',
        'other_financial_discount',
        'other_financial_vat',
        'other_financial_paid',
        'other_financial_payment_mothed',
        'other_financial_total_cost_extra_km',
        'other_financial_supplementary_service_cost',
        'other_financial_car_towing_cost',
        'other_financial_oil_change_cost',
        'other_financial_fuel_cost',
        'other_financial_total',
        'other_financial_remaining',
        'add_date',
        'add_by',
        'contract_location',
        'car_technical_condition_at_lease_dvr',
        'car_technical_condition_at_return_dvr'
    ];

    public function contract_data(){
        return $this->hasMany(\App\Models\Contract\ContractData::class, 'contract_id', 'id');
    }

    public function added_by()
    {
        return $this->belongsTo(\App\Models\Admin::class, 'add_by');
    }
}
