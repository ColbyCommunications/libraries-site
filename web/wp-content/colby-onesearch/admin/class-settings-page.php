<?php
/**
 * The admin settings page
 *
 * @package Colby/Onesearch
 */

namespace Colby_Onesearch\Admin;

final class Settings_Page
{

	/** Build the input boxes on the plugin settings page. */
	public function __construct()
	{

		$this->options = get_option( 'clbs_options' );

		add_options_page(
			'Bento Search',
			'Bento Search',
			'manage_options', 'clbs_options',
		array( $this, 'draw_settings_page' ));

		register_setting(
			'clbs_options',
			'clbs_options'
		);

		add_settings_section(
			'clbs_credentials',
			'API credentials',
			array( $this, 'draw_api_settings' ),
			'clbs_options'
		);

		add_settings_field(
			'clbs_summon_id',
			'Summon ID',
			array( $this, 'draw_summon_id' ),
			'clbs_options',
			'clbs_credentials'
		);

		add_settings_field(
			'clbs_summon_key',
			'Summon key',
			array( $this, 'draw_summon_key' ),
			'clbs_options',
			'clbs_credentials'
		);

		add_settings_field(
			'clbs_libanswers_id',
			'LibAnswers ID',
			array( $this, 'draw_libanswers_id' ),
			'clbs_options',
			'clbs_credentials'
		);

		add_settings_field(
			'clbs_libguides_id',
			'LibGuides ID',
			array( $this, 'draw_libguides_id' ),
			'clbs_options',
			'clbs_credentials'
		);

		add_settings_field(
			'clbs_libguides_key',
			'LibGuides key',
			array( $this, 'draw_libguides_key' ),
			'clbs_options',
			'clbs_credentials'
		);

	}


	/** Text for the API Settings section. */
	public function draw_api_settings()
	{
		// Not needed.
	}


	/**
	 *  Catchall for drawing settings-page fields.
	 *
	 *  @param string $name  The key of the setting that will be stored
	 *                       in the "clbs_options" array in the database.
	 */
	private function draw_field( $name )
	{
		if ( isset( $this->options[ $name ] ) ) {
			$value = $this->options[ $name ];
			echo "<input id='$name' name='clbs_options[$name] type='text' value='$value'>";
		} else {
			echo "<input id='$name' name='clbs_options[$name]' type='text' value=''>";
		}
	}


	/** Draw field for the LibAnswers API key. */
	public function draw_libanswers_id()
	{

		$this->draw_field( 'libanswers_id' );
	}


	/** Draw field for the LibGuides API ID. */
	public function draw_libguides_id()
	{

		$this->draw_field( 'libguides_id' );
	}


	/** Draw field for the LibGuides API key. */
	public function draw_libguides_key()
	{

		$this->draw_field( 'libguides_key' );
	}


	/** HTML base for the settings page. */
	public function draw_settings_page()
	{

		?>

		<div class="wrap">
			<h2>Colby OneSearch Settings</h2>
			<form action="options.php" method="post">
		
				<?php settings_fields( 'clbs_options' ); ?>
				<?php do_settings_sections( 'clbs_options' );?>

				<input name="Submit" type="submit" value="Save" />
			</form>
		</div>
		<?php
	}


	/** Draw field for the Summon API ID. */
	public function draw_summon_id()
	{

		$this->draw_field( 'summon_id' );
	}


	/** Draw field for the Summon API key. */
	public function draw_summon_key()
	{

		$this->draw_field( 'summon_key' );
	}
}
