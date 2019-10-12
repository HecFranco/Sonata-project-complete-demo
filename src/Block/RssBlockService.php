<?php

namespace App\Block;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Sonata\BlockBundle\Block\BlockContextInterface;
use Sonata\BlockBundle\Block\Service\AbstractBlockService;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Sonata\BlockBundle\Mapper\FormMapper;
use Sonata\BlockBundle\Model\BlockInterface;
use Sonata\Form\Validator\ErrorElement;

class RssBlockService extends AbstractBlockService
{
  public function configureSettings(OptionsResolver $resolver)
  {
      $resolver->setDefaults([
          'url' => false,
          'title' => 'Insert the rss title',
          //'template' => '@SonataBlock/Block/block_core_rss.html.twig',
          'template' => 'blocks/rrss_block.html.twig',
      ]);
  }

  public function buildEditForm(FormMapper $formMapper, BlockInterface $block)
  {
      $formMapper
          ->add('settings', 'sonata_type_immutable_array', [
              'keys' => [
                  ['url', 'url', ['required' => false]],
                  ['title', 'text', ['required' => false]],
              ]
          ])
      ;
  }  

  public function validateBlock(ErrorElement $errorElement, BlockInterface $block)
  {
      $errorElement
          ->with('settings.url')
              ->assertNotNull([])
              ->assertNotBlank()
          ->end()
          ->with('settings.title')
              ->assertNotNull([])
              ->assertNotBlank()
              ->assertMaxLength(['limit' => 50])
          ->end()
      ;
  }  

  public function execute(BlockContextInterface $blockContext, Response $response = null)
  {
      // merge settings
      $settings = $blockContext->getSettings();
      $feeds = false;
  
      if ($settings['url']) {
          $options = [
              'http' => [
                  'user_agent' => 'Sonata/RSS Reader',
                  'timeout' => 2,
              ]
          ];
  
          // retrieve contents with a specific stream context to avoid php errors
          $content = @file_get_contents($settings['url'], false, stream_context_create($options));
  
          if ($content) {
              // generate a simple xml element
              try {
                  $feeds = new \SimpleXMLElement($content);
                  $feeds = $feeds->channel->item;
              } catch (\Exception $e) {
                  // silently fail error
              }
          }
      }
  
      return $this->renderResponse($blockContext->getTemplate(), [
          'feeds'     => $feeds,
          'block'     => $blockContext->getBlock(),
          'settings'  => $settings
      ], $response);
  }  
}
